<?php

namespace App\Http\Controllers;

use App\Models\MYPDF;
use App\Http\Controllers\Controller;
use App\Models\InvoiceSetting;
use App\Models\Order;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Exception;

class InvoiceController extends Controller
{
    use  UploadTrait;

    public function pos_invoice($id)
    {
        $setting = InvoiceSetting::first();
        $order = Order::with(['orderDetails'])->findOrfail($id);
        $allProduct = $order->orderDetails;
        return view('pages.order.pos-invoice',compact('order','setting','allProduct'));
    }
    public function invoice($id)
    {
        $setting = InvoiceSetting::first();
        $signature = $setting->image_url;
        $data = Order::with(['orderDetails'])->findOrfail($id);

        $product = $data->orderDetails;

        // Create a new PDF document
        $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Set document information
        $pdf->setCreator(PDF_CREATOR);
        $pdf->setAuthor('Pos');
        $pdf->setTitle('Pos');
        $pdf->setSubject('Pos Invoice');
        $pdf->setKeywords('Invoice');

        // Set margins
        $pdf->setMargins(PDF_MARGIN_LEFT, 45, PDF_MARGIN_RIGHT);
        $pdf->setHeaderMargin(0);
        $pdf->setFooterMargin(0);

        // Remove default footer
        $pdf->setPrintFooter(false);

        // Set auto page breaks
        $pdf->setAutoPageBreak(true, PDF_MARGIN_BOTTOM);

        // Set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // Set font
        $pdf->SetFont('times', '', 12);
        // add a page
        $pdf->AddPage();

        // Print a text

        $html = '
            <table border="1" cellpadding="5" cellspacing="0" align="left">
                <tr nobr="true">';

            $type = 'To : ';
            // $html .= ' <td colspan="3"> <span>' . $type . ' ' . 'name' . '</span><br><span> Address: <span style="font-size:12px;">' . 'address' . '</span></span><br> <span>Phone: <span style="font-size:12px;">' . '$address->mobile '. ' </span></span>
            //             </td>';

            $html .= '
                        <td colspan="2"> Invoice: <span style="font-size:12px;">#' . $data->orderid . '</span> <br> Date: <span style="font-size:12px;">' . $data->date . '</span> </td>
                    </tr>
                </table>
            ';

        $pdf->writeHTML($html, true, false, true, false, '');

        $html = '
                <table border="1" cellpadding="3" cellspacing="0" align="left">

                <tr nobr="true" bgcolor="#e2e2e2">
                    <th align="center">SL.</th>
                    <th colspan="3" align="center">Sku</th>
                    <th  colspan="6" align="center">Product</th>
                    <th colspan="2" align="center">Unit Price</th>
                    <th align="center">Qty.</th>
                    <th colspan="2" align="center">Amount</th>
                </tr>';
        $index = 0;
        foreach ($product as $key => $value) {
            $index = $index + 1;
            $html .= '
                        <tr nobr="true">
                            <td style="font-size:12px;" align="center">' . $index . '.</td>
                            <td colspan="3" style="font-size:12px;"align="center">' . $value->products->sku . '</td>
                            <td colspan="6" style="font-size:12px;">' . $value->products->title . ' </td>
                            <td colspan="2" style="font-size:12px;"align="center">' . $value->price . '</td>
                            <td style="font-size:12px;"align="center">' . $value->qty . '</td>
                            <td colspan="2" style="font-size:12px;"align="center">' . $value->total . '</td>

                            </tr>';
        }
        $html .= '
                <tr nobr="true">
                    <td colspan="13" align="right">Subtotal:</td>
                    <td colspan="2" align="right">' . $data->subtotal . '</td>
                </tr>
                ';
        if ($data->discount) {
            $html .= '
                    <tr nobr="true">
                    <td colspan="13" align="right">Discount:</td>
                    <td colspan="2" align="right">' . $data->discount . '</td>
                </tr>  ';
        }

        if ($data->tax) {
        $html .= '
                <tr nobr="true">
                    <td colspan="13" align="right">Tax:</td>
                    <td colspan="2" align="right">' . $data->tax . '</td>
                </tr>
                ';
        }
        $html .= '
                <tr nobr="true">
                    <td colspan="13" align="right">Total: </td>
                    <td colspan="2" align="right">' . $data->total . '</td>
                </tr>

                </table>
            ';
        $pdf->writeHTML($html, true, false, true, false, '');

        // remove default header
        $pdf->setPrintHeader(false);

        // ---------------------------------------------------------

        //Close and output PDF document
        $pdf->Output($data->orderid . '.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+

    }
    public function invoice_setting()
    {
        $data['title'] = 'Settings';
        $data['selected'] = InvoiceSetting::firstOrfail();

        return view('pages.order.invoice-setting')->with($data);
    }
    public function invoice_update(Request $request)
    {
        try {
            $id = $request->input("id");

            $oldimage = $request->input("image_name");
            $image = $request->file("image");

            $oldpad = $request->input("pad_name");
            $pad = $request->file("pad");

            $oldqr = $request->input("qr_name");
            $qr = $request->file("qr");

            if ($image) {
                $image_name = $this->uploadImage($image, "assets/uploads/invoice/",[250, 100], $oldimage);
            }
            if ($pad) {
                $pad_name = $this->uploadFile($pad, "assets/uploads/invoice/", $oldpad);
            }
            if ($qr) {
                $qr_name = $this->uploadImage($qr, "assets/uploads/invoice/", [200, 200], $oldqr);
            }

            $arr = [
                "title" => $request->input('title'),
                "email" => $request->input('email'),
                "phone" => $request->input('phone'),
                "address" => $request->input('address'),
                "tax" => $request->input('tax'),
                "tax_status" => $request->input('tax_status'),
                "discount" => $request->input('discount'),
                "image" => $image_name ?? $oldimage,
                "pad" => $pad_name ?? $oldpad,
                "qr" => $qr_name ?? $oldqr,
            ];

            InvoiceSetting::where('id', $id)->update($arr);
            Toastr::success('Update Successfully', 'Success');
        } catch (Exception $e) {
            Toastr::error($e->getMessage(), 'Danger');
        }
        return redirect()->back();
    }
}
