<?php

namespace App\Helpers;

use Carbon\Carbon;

class TransactionHelper
{
    // Generate Invoice Code
    public static function generateCode($counter) {
        $codeYear = $counter['counter_year'];
        $codeMonth = $counter['counter_month'];
        $codeYearStr = substr($codeYear, -2);
        $codeCounter = str_pad($counter['counter_number'], 5, '0', STR_PAD_LEFT);

        return $counter['counter_code'] . $codeYearStr . $codeMonth . $codeCounter;
    }

    // Soal Per Waktuan
    public static function getYearNow($time_string) {
        $time = new \DateTime($time_string);
        $year = $time->format('Y');
        return $year;
    }

    public static function getMonthNow($time_string) {
        $time = new \DateTime($time_string);
        $month = $time->format('m');
        return $month;
    }

    public static function getFullTime($time_string) {
        $time = new Carbon($time_string);
        $month = [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
        ];

        $weekday = [
            "Minggu",
            "Senin",
            "Selasa",
            "Rabu",
            "Kamis",
            "Jumat",
            "Sabtu",
        ];

        $date = $time->format('d');
        $monthIndex = $time->format('n') - 1;
        $year = $time->format('Y');
        $dayIndex = $time->format('w');

        $result = "{$weekday[$dayIndex]}, {$date} {$month[$monthIndex]} {$year}";

        return $result;
    }

    // Soal Format Rupiah
    public static function convertToRupiah($angka) {
        $rupiah = "";
        $angkarev = strrev((string) $angka);
        for ($i = 0; $i < strlen($angkarev); $i++) {
            if ($i % 3 === 0) {
                $rupiah .= substr($angkarev, $i, 3) . ".";
            }
        }

        return "Rp. " . strrev(substr($rupiah, 0, -1));
    }

    // Generate Template Email
    public static function generateInvoiceContentEmail($data) {
        $data_email = '<div>
        <p>Halo kak <strong> ' . $data->full_name . '</strong>, terima kasih telah order <strong> ' . $data->product . '</strong>.
        Semoga proses belajar bahasa Jepangnya makin lancar. Berikut ini adalah detail invoice kakak.</p>
        <div>
            <h2>Detail Invoice</h2>
            <hr/>
            <strong>Nomor Invoice</strong> : ' . $data->invoice_number . '<br/>
            <strong>Nama Produk</strong>   : ' . $data->product . '<br/>
            <strong>Tanggal</strong>       : ' . TransactionHelper::getFullTime($data->created_at) . '<br/>
            <strong>Total</strong>         : ' . TransactionHelper::convertToRupiah($data->price) . '<br/>
            <hr/>
            <strong>Nama Pemesan</strong>  : ' . $data->full_name . '<br/>
            <strong>Email</strong>         : ' . $data->email . '<br/>
            <strong>Nomor HP</strong>      : ' . $data->phone . '<br/>
            <hr/>
        </div>
        <p>Untuk melakukan pembayaran, silahkan transfer ke salah satu rekening ini :</p>
        <hr/>
        <p><strong>BCA</strong> 5610264125 Muhammad Maulana Ahsan</p>
        <p><strong>Mandiri</strong> 178-000-1599-048 Muhammad Maulana Ahsan</p>
        <p><strong>OVO, GoPay, Dana, ShopeePay</strong> 0822-2600-5644 Muhammad Maulana Ahsan</p>
        <hr/>
        <p>Sudah melakukan transfer? Bisa chat ke WhatsApp admin kami.</p>
        <p><a href="https://api.whatsapp.com/send?phone=6285855997747&text=Saya%20sudah%20transfer%20kak%2C%20tolong%20segera%20diproses%20%F0%9F%98%81">Chat Admin Kejepangan</a></p>
        <p>Regard,<br/>
        <strong>Kejepangan - Bahasa Jepang Asik</strong></p>
    </div>';
    return $data_email;
    }

    public static function generateSuccessEmail($data) {
        $data_email = '<div>
        <p>Konnichiwa ' . $data->full_name . '-san, Ahsan desu.</p>
        <p>Makasih udah percaya untuk membeli paket ebook ku, Aku harap ebook ini bisa bermanfaat untukmu dan membuatmu lebih jago lagi di bidang bahasa Jepang.</p>
        <p>Dibawah akan Aku kirimkan link download ebooknya beserta bonus replay webinar <strong>"Cara Belajar Bahasa Jepang Otodidak"</strong></p>
        <br/>
        <ul>
        <li><a href="https://drive.google.com/file/d/1-7Hbd7eKhFbnIk-57MzysGeAqLgRy28o/view?usp=drive_web">Cara Asik Belajar Kanji.pdf</a></li>
        <li><a href="https://drive.google.com/file/d/1HaPcSr6vJmHwtmep4ZKMgCxjMSySBZmc/view?usp=drive_web">Formula Pede & Lancar Ngomong Jepang.pdf</a></li>
        <li><a href="https://drive.google.com/file/d/1szb323i2-CCc4yOJSi3dFGTtWEHJO-mv/view?usp=drive_web">Menguasai Kosakata Tak Lagi Membosankan.pdf</a></li>
        <li><a href="https://drive.google.com/file/d/1jHpqJfdOSJLBHklwQWd38S5APYYCclEh/view?usp=sharing">Replay Webinar Cara Belajar Bahasa Jepang Otodidak</a></li>
        </ul>
        <br/>
        <p><strong>Regard,<br/>
        Ahsan - @Kejepangan<strong></p>
        </div>';
        return $data_email;
    }

    public static function generateReminderEmail($data) {
        $data_email = '<div>
        <p>Hai kak <strong>' . $data->full_name . '</strong>...</p>
        <p>Pemesanan kakak untuk produk <strong>' . $data->product . '</strong> akan segera expired. Agar tetap bisa mendapatkan diskon dan semua benefit dari Kejepangan, silahkan kakak bisa transfer sejumlah ' . TransactionHelper::convertToRupiah($data->price) . ' ke:</p>
        <hr/>
            <p><strong>BCA</strong> 5610264125 Muhammad Maulana Ahsan</p>
            <p><strong>Mandiri</strong> 178-000-1599-048 Muhammad Maulana Ahsan</p>
            <p><strong>OVO, GoPay, Dana, ShopeePay</strong> 0822-2600-5644 Muhammad Maulana Ahsan</p>
        <hr/>
            <p>Kalau kak ' . $data->full_name . ' masih ada yang mau ditanyakan silahkan klik link dibawah, nanti kakak akan langsung otomatis kirim pesan ke WA admin Kejepangan :</p>
            <p><a href="https://api.whatsapp.com/send?phone=6285855997747&text=Saya%20sudah%20transfer%20kak%2C%20tolong%20segera%20diproses%20%F0%9F%98%81">Chat Admin Kejepangan</a></p>
            <p>Regard,<br/>
            <strong>Kejepangan - Bahasa Jepang Asik</strong></p>
        </div>';
    return $data_email;
    }
}

?>