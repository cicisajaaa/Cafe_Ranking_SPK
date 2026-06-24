```blade
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Ranking Cafe</title>

    <style>

        body{
            font-family: DejaVu Sans, sans-serif;
            margin:35px;
            color:#333;
            line-height:1.6;
        }

        .header{
            text-align:center;
            margin-bottom:20px;
        }

        .logo{
            font-size:40px;
            margin-bottom:10px;
        }

        .title{
            font-size:22px;
            font-weight:bold;
            text-transform:uppercase;
            margin-bottom:5px;
        }

        .subtitle{
            font-size:12px;
            color:#666;
        }

        .line{
            border-bottom:3px solid #1f2937;
            margin-top:15px;
            margin-bottom:25px;
        }

        .info-table{
            width:100%;
            margin-bottom:20px;
            font-size:12px;
        }

        .info-table td{
            padding:4px;
        }

        .section-title{
            font-size:15px;
            font-weight:bold;
            margin-bottom:10px;
            color:#1f2937;
        }

        table.ranking{
            width:100%;
            border-collapse:collapse;
            margin-top:10px;
        }

        table.ranking th{
            background:#1f2937;
            color:white;
            padding:10px;
            text-align:center;
            font-size:12px;
        }

        table.ranking td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
            font-size:12px;
        }

        .gold{
            background:#FFF8DC;
            font-weight:bold;
        }

        .silver{
            background:#F1F3F5;
            font-weight:bold;
        }

        .bronze{
            background:#FDE2CF;
            font-weight:bold;
        }

        .top3{
            margin-top:20px;
            padding:15px;
            border:1px solid #ddd;
            background:#f8f9fa;
            border-radius:5px;
        }

        .top3-title{
            font-weight:bold;
            margin-bottom:10px;
        }

        .summary{
            margin-top:20px;
            padding:15px;
            background:#f8fafc;
            border-left:5px solid #2563eb;
            font-size:12px;
            text-align:justify;
        }

        .signature{
            margin-top:60px;
            width:100%;
        }

        .signature-box{
            width:250px;
            float:right;
            text-align:center;
        }

        .footer{
            position:fixed;
            bottom:-10px;
            left:0;
            right:0;

            text-align:center;

            font-size:10px;

            color:#777;

            border-top:1px solid #ccc;

            padding-top:8px;
        }

    </style>
</head>
<body>

    <div class="header">

        <div class="logo">
            ☕
        </div>

        <div class="title">
            LAPORAN HASIL PERANGKINGAN CAFE
        </div>

        <div class="subtitle">
            Sistem Pendukung Keputusan Pemilihan Cafe
        </div>

        <div class="subtitle">
            Metode TOPSIS
        </div>

        <div class="subtitle">
            Technique for Order Preference by Similarity to Ideal Solution
        </div>

        <div class="subtitle">
            Program Studi Teknik Informatika Universitas Islam Kalimantan Muhammad Arsyad Al-Banjari
        </div>

    </div>

    <div class="line"></div>

    <table class="info-table">

        <tr>
            <td width="180">
                <strong>Tanggal Cetak</strong>
            </td>
            <td>
                : {{ date('d F Y H:i') }}
            </td>
        </tr>

        <tr>
            <td>
                <strong>Total Alternatif</strong>
            </td>
            <td>
                : {{ $rankings->count() }} Cafe
            </td>
        </tr>

        <tr>
            <td>
                <strong>Metode</strong>
            </td>
            <td>
                : TOPSIS
            </td>
        </tr>

    </table>

    <div class="section-title">
        Hasil Perangkingan
    </div>

    <table class="ranking">

        <thead>

            <tr>
                <th width="15%">Ranking</th>
                <th>Nama Cafe</th>
                <th width="20%">Nilai TOPSIS</th>
            </tr>

        </thead>

        <tbody>

            @foreach($rankings as $ranking)

            <tr
            @if($ranking->ranking == 1)
                class="gold"
            @elseif($ranking->ranking == 2)
                class="silver"
            @elseif($ranking->ranking == 3)
                class="bronze"
            @endif
            >

                <td>

                    @if($ranking->ranking == 1)

                        JUARA 1

                    @elseif($ranking->ranking == 2)

                        JUARA 2

                    @elseif($ranking->ranking == 3)

                        JUARA 3

                    @else

                        {{ $ranking->ranking }}

                    @endif

                </td>

                <td>
                    {{ $ranking->cafe->nama_cafe }}
                </td>

                <td>
                    {{ number_format($ranking->nilai_topsis,3) }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="top3">

        <div class="top3-title">
            Top 3 Cafe Rekomendasi
        </div>

        <ol>

            @foreach($rankings->take(3) as $r)

            <li>

                {{ $r->cafe->nama_cafe }}

                (Nilai:

                {{ number_format($r->nilai_topsis,3) }}

                )

            </li>

            @endforeach

        </ol>

    </div>

    <div class="summary">

        <strong>Kesimpulan</strong>

        <br><br>

        Berdasarkan hasil perhitungan menggunakan metode
        Technique for Order Preference by Similarity to Ideal Solution (TOPSIS),
        diperoleh alternatif terbaik yaitu

        <strong>
            {{ $rankings->first()->cafe->nama_cafe ?? '-' }}
        </strong>

        dengan nilai preferensi sebesar

        <strong>
            {{ number_format($rankings->first()->nilai_topsis ?? 0,3) }}
        </strong>.

        Alternatif tersebut memiliki tingkat kedekatan tertinggi
        terhadap solusi ideal positif sehingga direkomendasikan
        sebagai pilihan cafe terbaik berdasarkan seluruh kriteria
        yang telah ditentukan.

    </div>

    <div class="signature">

        <div class="signature-box">

            Banjarmasin,
            {{ date('d F Y') }}

            <br><br><br><br><br>

            ______________________

            <br>

            <strong>
                Administrator Sistem
            </strong>

        </div>

    </div>

    <div class="footer">

        Sistem Pendukung Keputusan Pemilihan Cafe Menggunakan Metode TOPSIS

    </div>

</body>
</html>
