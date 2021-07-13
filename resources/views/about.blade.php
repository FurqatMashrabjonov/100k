@extends("layouts.app")

@section("content")

    <div class="container m-auto">

        <h1 class="lg:text-2xl text-lg font-extrabold leading-none text-gray-900 tracking-tight mb-2"> Adminlar uchun
            ma'lumot </h1>
        <br><br>

        Avvalom bor <a style="color: #0e6dcd" href="{{url("/")}}">rinka.uz</a> proektiga bo'lgan qiziqishingiz uchun
        katta rahmat. Ushbu sahifada siz rinka.uz saytining
        adminlar uchun bo'limi bilan tanishishingiz mumkin, quyida biz ushbu bo'limni qisqacha ADMIN-PANEL deb
        ataymiz.

        Admin bo'limi quyidagi kornishiga ega. Admin-panel ga o'tish uchun siz 100k.uz saytidan ro'yhatdan o'tgan
        bolishingiz kerak. Agar sizda 100k.uz saytida profil bo'lsa
        <a style="color: #0e6dcd" href="{{url("/profile/admin")}}">https://rinka.uz/admin</a>
        linki orqali admin-panel ga o'ting.
        <br>

        <img src="{{asset("img/about.png")}}" alt="">
        <br>

        Admin-panelning asosiy vazifasi sotuvni avtomatlashtirish iloji boricha inson ishtirokini kamaytirishdan va
        adminlarga qulay interfeys taqdim etish. Eng asosiysi mahsulotlar sotuvini kopaytirish orqali adminlarga
        internetda qulay va xavsiz pul ishlash tizimini yo'lga qo'yish imkoniyatini yaratadi.

        <br>
        <strong>Tizimning afzallik tomonlari:</strong>
        <ul style="list-style-type: disc">
            <li>Har bir sotilgan mahsulotdan o'z ulushingizni avtomatik tarzda admin-paneldagi hisobingizga tushurib
                beriladi.
            </li>
            <li>Barcha ishga tushurilgan reklamalarni statistikasini kuzatib borasiz.</li>
            <li>Tezkor yetqazib berish (1-3 kun) tizimi evaziga xaridorlar ishonchi yanada ortadi.</li>
            <li>Hisobingizdagi pul 72 soat ichida plastik kartaga tushurib beriladi.</li>
            <li>Sizning reklamangizdan tushgan barcha buyurtmalar ro'yhatini kora olasiz.
            <li>(bu orqali auditoriya haqida yanada koproq statistika toplab reklama sifatini oshirish imkoniyatini
                beradi).
            <li>Tezkor call center, har bir tushgan buyurtma 1 soat ichida ko'rib chiqiladi, hech qaysi buyurtma
                etibordan
            </li>
            chetda qolmaydi. Call center 3 yildan koproq tajribasi bor xodimlar jamoasidan tashkil topgan.
        </ul>
        <br>
        <strong>Admin-panel qiuyidagi bo'limlardan iborat:</strong>
        <br>
        <ul style="list-style-type: disc">
            <li>Mahsulotlar;</li>
            <li>Oqim;</li>
            <li>Statistika;</li>
            <li>To'lov;</li>
            <li>Mening jamoam;</li>
            <li>So'rovlar;</li>
            <li>Balans tarixi;</li>
        </ul>

    </div>

@endsection

