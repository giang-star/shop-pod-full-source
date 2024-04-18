<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'id' => 1,
                'first_name' => 'CodeLean',
                'email' => 'gc123580@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 2,
                'status'=> 1,
                'token'=> '',
                'description' => null,
            ],
            [
                'id' => 2,
                'first_name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => null,
                'level' => 1,
                'status'=> 1,
                'token'=> '',
                'description' => null,
            ],
            [
                'id' => 3,
                'first_name' => 'Shane Lynch',
                'email' => 'ShaneLynch@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-0.png',
                'level' => 1,
                'status'=> 1,
                'token'=> '',
                'description' => 'Aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud amodo'
            ],
            [
                'id' => 4,
                'first_name' => 'Brandon Kelley',
                'email' => 'BrandonKelley@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-1.png',
                'level' => 1,
                'status'=> 1,
                'token'=> '',
                'description' => null,
            ],
            [
                'id' => 5,
                'first_name' => 'Roy Banks',
                'email' => 'RoyBanks@gmail.com',
                'password' => Hash::make('123456'),
                'avatar' => 'avatar-2.png',
                'level' => 1,
                'status'=> 1,
                'token'=> '',
                'description' => null,
            ],
        ]);

        DB::table('blogs')->insert([
            [
                'user_id' => 3,
                'title' => 'The Personality Trait That Makes People Happier',
                'image' => 'blog-1.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'This was one of our first days in Hawaii last week.',
                'image' => 'blog-2.jpg',
                'category' => 'Do Quang Tiep',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Last week I had my first work trip of the year to Sonoma Valley',
                'image' => 'blog-3.jpg',
                'category' => 'TRAVEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Happppppy New Year! I know I am a little late on this post',
                'image' => 'blog-4.jpg',
                'category' => 'Do Quang Tiep',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Absolue collection. The Lancome team has been one…',
                'image' => 'blog-5.jpg',
                'category' => 'MODEL',
                'content' => '',
            ],
            [
                'user_id' => 3,
                'title' => 'Writing has always been kind of therapeutic for me',
                'image' => 'blog-6.jpg',
                'category' => 'Do Quang Tiep',
                'content' => '',
            ],
        ]);

        DB::table('brands')->insert([
            [
                'name' => 'Deuncoolstudios',
            ]
        ]);

        DB::table('product_categories')->insert([
            [
                'name' => 'T-Shirt',
            ],
            [
                'name' => 'Hoddie',
            ],
            [
                'name' => 'Áo khoác nỉ',
            ],
        ]);

        DB::table('products')->insert([
            [
                'id' => 1,
                'brand_id' => 1,
                'product_category_id' => 3,
                'name' => 'Áo khoác nỉ form rộng hoodiezip ',
                'description' => 'DEUNCOOL STUDIOS HOODIE<br>

                Chất liệu : Nỉ cotton 100% (l&oacute;t b&ocirc;ng).<br>
                
                &ldquo; Với trường hợp &aacute;o chật bạn h&atilde;y nhắn tin cho shop để shop hỗ trợ đổi size cho bạn nh&eacute;, đừng vội đ&aacute;nh gi&aacute; sản phẩm, tội shop lắm ạ 🥺&ldquo;<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm nỉ mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                -Size M: D&agrave;i 58cm<br>
                
                -Size M: D&agrave;i 63cm<br>
                
                -Size L: D&agrave;i 68cm<br>
                
                -Size XL: D&agrave;i 72cm<br>
                
                &reg;️ Designed by UNCOOL TEAMS.<br>
                
                📎 Instagram: @Deuncoolstudios.<br>
                
                AVAILABLE NOW 🛒<br>
                
                Mua ngay đi kẻo hết lạnh b&acirc;y giờ #hoodie #hoodiezip #hoodieformrong #aokhoac #aolanh #aohoodiezipdep<br>',
                'content' => 'Chất liệu nỉ bông siêu ấm DEUNCOOL',
                'price' => 420000,
                'qty' => 20,
                'discount' => 320000,
                'weight' => 1.3,
                'sku' => '00012',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 2,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name'=>'Áo hoodie nỉ bông DEUNCOOL BASIC ver 1.0 ',
                'description' => '&hearts;️ CH&Agrave;O CẬU Ạ !<br>

                MẪU HOODIE B&Ecirc;N SHOP CHỈ C&Ograve;N LẺ V&Agrave;I CHIẾC - V&Agrave; B&Ecirc;N SHOP MỚI VỀ MẪU HOODIEZIP BẠN NHA - HOODIEZIP TH&Igrave; VẪN SẼ C&Oacute; TAG MŨ V&Agrave; H&Igrave;NH IN SAU LƯNG NHƯ &Aacute;O HOODIE CẬU NHA - MẶT TRƯỚC HOODIEZIP SẼ L&Agrave; TRƠN GIỐNG ẢNH Ạ - V&Igrave; HOODIEZIP MỚI VỀ N&Ecirc;N CHƯA C&Oacute; ẢNH MẪU MONG CẬU TH&Ocirc;NG CẢM Ạ &hearts;️ CẬU ĐỌC KỸ PHẦN PH&Acirc;N LOẠI SẢN PHẨM ĐỂ TR&Aacute;NH ĐẶT NHẦM NHA<br>
                
                🧸 DEUNCOOL STUDIOS HOODIE<br>
                
                - M&agrave;u Grey Light Chất liệu : Nỉ cotton 100% (l&oacute;t b&ocirc;ng).<br>
                
                Size: M/L/XL.<br>
                
                &ldquo; Với trường hợp &aacute;o chật bạn h&atilde;y nhắn tin cho shop để shop hỗ trợ đổi size cho bạn nh&eacute;, đừng vội đ&aacute;nh gi&aacute; sản phẩm, tội shop lắm ạ 🥺&ldquo;<br>
                
                - Năm nay shop d&ugrave;ng d&acirc;y bản tr&ograve;n giống trong video nh&eacute; &hearts;️<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm nỉ mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                -Size M: D&agrave;i 63cm<br>
                
                -Size L: D&agrave;i 68cm<br>
                
                -Size XL: D&agrave;i 72cm<br>
                
                &reg;️ Designed by UNCOOL TEAMS.<br>
                
                📎 Instagram: @Deuncoolstudios.<br>
                
                AVAILABLE NOW 🛒<br>
                
                Mua ngay đi kẻo hết lạnh b&acirc;y giờ<br>',
                'content' => '- Màu Grey Light - 100% cotton mềm mịn cho nam nữ - ẢNH THẬT',
                'price' => 420000,
                'qty' => 20,
                'discount' => 320000,
                'weight' => 1.3,
                'sku' => 00022,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 3,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Áo thun tay lỡ form rộng DEUNCOOL Basic Tee Drop 1.0 ',
                'description' => 'DEUNCOOL BASIC TEE<br>

                - M&agrave;u Trắng Chất liệu : Cotton 100%<br>
                
                Size: L/XL.<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                - Size L: Từ 1m50 - 1m65<br>
                
                - Size XL: Từ 1m65 - 1m85<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm vải mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm &reg;️ Designed by UNCOOL TEAMS. 📎 Instagram: @Deuncoolstudios. 📌CH&Iacute;NH S&Aacute;CH ĐỔI H&Agrave;NG:<br>
                
                - Hỗ trợ đổi h&agrave;ng trong v&ograve;ng 3 ng&agrave;y t&iacute;nh từ ng&agrave;y nhận được sản phẩm.<br>
                
                - Kh&ocirc;ng &aacute;p dụng với c&aacute;c sản phẩm khi mua flashsale.<br>
                
                - Điều kiện:<br>
                
                + Sản phẩm c&oacute; lỗi từ nh&agrave; sản xuất (Phản hồi shop k&egrave;m video mở h&agrave;ng ngay khi nhận sản phẩm)<br>
                
                + Chỉ hỗ trợ đổi h&agrave;ng khi sản phẩm chưa được sử dụng c&ograve;n nguy&ecirc;n tem v&agrave; tag gi&aacute; của cửa h&agrave;ng<br>
                
                + Chỉ &aacute;p dụng đổi đổi với sản phẩm mua nguy&ecirc;n gi&aacute; v&agrave; chỉ hỗ trợ đổi 01 lần duy nhất.<br>
                
                + Sản phẩm muốn đổi c&oacute; gi&aacute; tương đương hoặc lớn hơn<br>
                
                AVAILABLE NOW 🛒 Direct me: 0334496975<br>',
                'content' => "- Màu Trắng - In UNC.STUDIOS",
                'price' => 235000,
                'qty' => 20,
                'discount' => 149000,
                'weight' => 0.4,
                'sku' => '00013',
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 4,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Áo thun tay lỡ form rộng DEUNCOOL Basic Tee Drop 1.0 ',
                'description' => 'DEUNCOOL BASIC TEE<br>

                - M&agrave;u đen Chất liệu : Cotton 100%<br>
                
                Size: L/XL.<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                - Size L: Từ 1m50 - 1m65<br>
                
                - Size XL: Từ 1m65 - 1m85<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm vải mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm &reg;️ Designed by UNCOOL TEAMS. 📎 Instagram: @Deuncoolstudios. 📌CH&Iacute;NH S&Aacute;CH ĐỔI H&Agrave;NG:<br>
                
                - Hỗ trợ đổi h&agrave;ng trong v&ograve;ng 3 ng&agrave;y t&iacute;nh từ ng&agrave;y nhận được sản phẩm.<br>
                
                - Kh&ocirc;ng &aacute;p dụng với c&aacute;c sản phẩm khi mua flashsale.<br>
                
                - Điều kiện:<br>
                
                + Sản phẩm c&oacute; lỗi từ nh&agrave; sản xuất (Phản hồi shop k&egrave;m video mở h&agrave;ng ngay khi nhận sản phẩm)<br>
                
                + Chỉ hỗ trợ đổi h&agrave;ng khi sản phẩm chưa được sử dụng c&ograve;n nguy&ecirc;n tem v&agrave; tag gi&aacute; của cửa h&agrave;ng<br>
                
                + Chỉ &aacute;p dụng đổi đổi với sản phẩm mua nguy&ecirc;n gi&aacute; v&agrave; chỉ hỗ trợ đổi 01 lần duy nhất.<br>
                
                + Sản phẩm muốn đổi c&oacute; gi&aacute; tương đương hoặc lớn hơn<br>
                
                AVAILABLE NOW 🛒 Direct me: 0334496975<br>',
                'content' => '- Màu Trắng Đen - Logo Signature',
                'price' => 215000,
                'qty' => 20,
                'discount' => 149000,
                'weight' => 0.3,
                'sku' => 000021,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 5,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => "TRAP DEUNCOOL STUDIOS -  [ DT02 ]",
                'description' => 'DEUNCOOL BASIC TEE<br>

                - M&agrave;u đen Chất liệu : Cotton 100%<br>
                
                Size: L/XL.<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                - Size L: Từ 1m50 - 1m65<br>
                
                - Size XL: Từ 1m65 - 1m85<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm vải mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm &reg;️ Designed by UNCOOL TEAMS. 📎 Instagram: @Deuncoolstudios. 📌CH&Iacute;NH S&Aacute;CH ĐỔI H&Agrave;NG:<br>
                
                - Hỗ trợ đổi h&agrave;ng trong v&ograve;ng 3 ng&agrave;y t&iacute;nh từ ng&agrave;y nhận được sản phẩm.<br>
                
                - Kh&ocirc;ng &aacute;p dụng với c&aacute;c sản phẩm khi mua flashsale.<br>
                
                - Điều kiện:<br>
                
                + Sản phẩm c&oacute; lỗi từ nh&agrave; sản xuất (Phản hồi shop k&egrave;m video mở h&agrave;ng ngay khi nhận sản phẩm)<br>
                
                + Chỉ hỗ trợ đổi h&agrave;ng khi sản phẩm chưa được sử dụng c&ograve;n nguy&ecirc;n tem v&agrave; tag gi&aacute; của cửa h&agrave;ng<br>
                
                + Chỉ &aacute;p dụng đổi đổi với sản phẩm mua nguy&ecirc;n gi&aacute; v&agrave; chỉ hỗ trợ đổi 01 lần duy nhất.<br>
                
                + Sản phẩm muốn đổi c&oacute; gi&aacute; tương đương hoặc lớn hơn<br>
                
                AVAILABLE NOW 🛒 Direct me: 0334496975<br>',
                'content' => null,
                'price' => 250000,
                'qty' => 20,
                'discount' => 179000,
                'weight' => 0.3,
                'sku' => 000213,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 6,
                'brand_id' => 1,
                'product_category_id' => 1,
                'name' => 'Áo Thun Tay Lỡ Deuncool Basic Organ Form Rộng Drop 2.0',
                'description' => 'DEUNCOOL BASIC TEE - Màu Trắng / Đen<br>

                - M&agrave;u đen Chất liệu : Cotton 100%<br>
                
                Size: L/XL.<br>
                
                _________________<br>
                
                FORM &Aacute;O:<br>
                
                - Size L: Từ 1m50 - 1m65<br>
                
                - Size XL: Từ 1m65 - 1m85<br>
                
                _________________<br>
                
                📦 HƯỚNG DẪN SỬ DỤNG:<br>
                
                - Giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm<br>
                
                - Giặt trước khi sử dụng để ko bị d&iacute;nh l&ocirc;ng khi mang do sản phẩm vải mới<br>
                
                - Giặt mặt trong để bảo quản h&igrave;nh in, th&ecirc;u giặt bằng tay để giữ chất lượng, m&agrave;u sắc &amp; độ bền của sản phẩm &reg;️ Designed by UNCOOL TEAMS. 📎 Instagram: @Deuncoolstudios. 📌CH&Iacute;NH S&Aacute;CH ĐỔI H&Agrave;NG:<br>
                
                - Hỗ trợ đổi h&agrave;ng trong v&ograve;ng 3 ng&agrave;y t&iacute;nh từ ng&agrave;y nhận được sản phẩm.<br>
                
                - Kh&ocirc;ng &aacute;p dụng với c&aacute;c sản phẩm khi mua flashsale.<br>
                
                - Điều kiện:<br>
                
                + Sản phẩm c&oacute; lỗi từ nh&agrave; sản xuất (Phản hồi shop k&egrave;m video mở h&agrave;ng ngay khi nhận sản phẩm)<br>
                
                + Chỉ hỗ trợ đổi h&agrave;ng khi sản phẩm chưa được sử dụng c&ograve;n nguy&ecirc;n tem v&agrave; tag gi&aacute; của cửa h&agrave;ng<br>
                
                + Chỉ &aacute;p dụng đổi đổi với sản phẩm mua nguy&ecirc;n gi&aacute; v&agrave; chỉ hỗ trợ đổi 01 lần duy nhất.<br>
                
                + Sản phẩm muốn đổi c&oacute; gi&aacute; tương đương hoặc lớn hơn<br>
                
                AVAILABLE NOW 🛒 Direct me: 0334496975<br>',
                'content' => null,
                'price' => 250000,
                'qty' => 20,
                'discount' => 179000,
                'weight' => 0.3,
                'sku' => 00210,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 7,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo khoác nỉ xám Basic ver 2.0 ',
                'description' => 'Hoodie Zip Basic ®️ available<br>
                Grey <br>
                Chất liệu : Nỉ cotton 100% (lót bông).<br>
                Size: Oversize<br>
                _________________<br>
                📦  HƯỚNG DẪN SỬ DỤNG: <br>
                - Giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm <br>
                - Giặt trước khi sử dụng để ko bị dính lông khi mang do sản phẩm nỉ mới <br>
                - Giặt mặt trong để bảo quản hình in, thêu giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm<br>
                _________________<br>
                
                FORM ÁO:<br>         
                - Dài 72cm<br>
                - Form dưới 70kg<br>
                
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                🛒 Mua ngay đi kẻo hết lạnh bây giờ.',
                'content' => 'Mũ 2 lớp form rộng oversize DEUNCOOL BASIC',
                'price' => 380000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.6,
                'sku' => 02134,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 8,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie basic form rộng DEUNCOOL VER 2',
                'description' => 'Hoodie Zip Basic ®️ available<br>
                Grey <br>
                Chất liệu : Nỉ cotton 100% (lót bông).<br>
                Size: Oversize<br>
                _________________<br>
                📦  HƯỚNG DẪN SỬ DỤNG: <br>
                - Giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm <br>
                - Giặt trước khi sử dụng để ko bị dính lông khi mang do sản phẩm nỉ mới <br>
                - Giặt mặt trong để bảo quản hình in, thêu giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm<br>
                _________________<br>
                
                FORM ÁO:<br>   
                - Dài 72cm<br>
                - Form dưới 70kg<br>
                
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                🛒 Mua ngay đi kẻo hết lạnh bây giờ<br>',
                'content' => null,
                'price' => 380000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.5,
                'sku' => 21314,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 9,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie nỉ bông DEUNCOOL BASIC ver 1.0',
                'description' => 'DEUNCOOL STUDIOS HOODIE - Màu Black<br>
                Chất liệu : Nỉ cotton 100% (lót bông).<br>
                Size: M/L/XL.<br>
                _________________<br>
                📦  HƯỚNG DẪN SỬ DỤNG: <br>
                - Giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm <br>
                - Giặt trước khi sử dụng để ko bị dính lông khi mang do sản phẩm nỉ mới <br>
                - Giặt mặt trong để bảo quản hình in, thêu giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm<br>
                _________________<br>
                
                FORM ÁO:    <br>         
                -Size M: Ngang 60cm, Dài 65cm<br>
                -Size L: Ngang 64cm, Dài 67cm<br>
                -Size XL: Ngang 70cm, Dài 74cm<br>
                
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                🛒 Mua ngay đi kẻo hết lạnh bây giờ<br>',
                'content' => 'Màu Black - 100% cotton mềm mịn cho nam nữ - ẢNH THẬT',
                'price' => 420000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.3,
                'sku' => 213124,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 10,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie nỉ bông DEUNCOOL BASIC ver 1.0',
                'description' => 'Áo Hoodie Màu Xanh Lục Cực Lạ, Chất Liêu Nỉ Bông Ấm Áp, Form Rộng Rớt Vai<br>
                _________________<br>
                
                Chất liệu : Nỉ bông cotton dày mịn, ấm <br>
                Kích cỡ : M, L, XL<br>
                Được thiết kế độc đáo cho người mặc, khi mặc lên cảm giác mát mẻ thoải mái tự tin sải bước khi đi ra ngoài, đi chơi du lịch<br>
                _________________<br>
                
                CAM KẾT CỦA SHOP:✨<br>
                + Cam kết 100% đổi hàng do lỗi shop và lỗi sản phẩm.<br>
                + Nếu có bất cứ điều gì  không hài lòng về sản phẩm, khách vui lòng liên hệ với shop trước khi đánh giá shop nhé. Shop sẽ sắp xếp đổi, trả hàng hoặc hoàn tiền cho khách ạ!<br>
                + Mọi người nhớ theo dõi shop để cập nhật mẫu mới và ưu đãi nhanh nhất nha! 💓<br>
                
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                
                #sweater #áo_sweater #áosweaternam #áosweaternữ #áosweaterunisex #áosweaterrộng #áo_sweater_form_rộng #áo_sweater_đẹp #áo_sweater_nữ_đẹp #hoodie #áo_hoodie #áo_hoodie_nam #áo_hoodie_nữ #áo_hoodie_unisex #áo_hoodie_rộng #áo_hoodie_form_rộng #áo_hoodie_đẹp #áo_hoodie_nữ_đẹp #áo_nỉ<br>',
                'content' => 'Màu Green Light - 100% cotton mềm mịn cho nam nữ - ẢNH THẬT',
                'price' => 400000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.3,
                'sku' => 213124,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 11,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie nỉ bông DEUNCOOL BASIC ver 1.0',
                'description' => 'Áo Hoodie Màu Xanh Lục Cực Lạ, Chất Liêu Nỉ Bông Ấm Áp, Form Rộng Rớt Vai<br>
                _________________<br>
                
                Chất liệu : Nỉ bông cotton dày mịn, ấm <br>
                Kích cỡ : M, L, XL<br>
                Được thiết kế độc đáo cho người mặc, khi mặc lên cảm giác mát mẻ thoải mái tự tin sải bước khi đi ra ngoài, đi chơi du lịch<br>
                _________________<br>
                
                CAM KẾT CỦA SHOP:✨<br>
                + Cam kết 100% đổi hàng do lỗi shop và lỗi sản phẩm.<br>
                + Nếu có bất cứ điều gì  không hài lòng về sản phẩm, khách vui lòng liên hệ với shop trước khi đánh giá shop nhé. Shop sẽ sắp xếp đổi, trả hàng hoặc hoàn tiền cho khách ạ!<br>
                + Mọi người nhớ theo dõi shop để cập nhật mẫu mới và ưu đãi nhanh nhất nha! 💓<br>
                
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                
                #sweater #áo_sweater #áosweaternam #áosweaternữ #áosweaterunisex #áosweaterrộng #áo_sweater_form_rộng #áo_sweater_đẹp #áo_sweater_nữ_đẹp #hoodie #áo_hoodie #áo_hoodie_nam #áo_hoodie_nữ #áo_hoodie_unisex #áo_hoodie_rộng #áo_hoodie_form_rộng #áo_hoodie_đẹp #áo_hoodie_nữ_đẹp #áo_nỉ<br>',
                'content' => 'Màu Beige Light - 100% cotton mềm mịn cho nam nữ',
                'price' => 400000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.3,
                'sku' => 213124,
                'featured' => true,
                'tag' => 'Clothing',
            ],
            [
                'id' => 12,
                'brand_id' => 1,
                'product_category_id' => 2,
                'name' => 'Áo hoodie Đỏ Tết DEUNCOOL BASIC ver 1.0',
                'description' => 'DEUNCOOL STUDIOS HOODIE - Màu Red Cherry<br>
                Chất liệu : Nỉ cotton 100% (lót bông).<br>
                Size: M/L/XL.<br>
                _________________<br>
                📦  HƯỚNG DẪN SỬ DỤNG: <br>
                - Giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm <br>
                - Giặt trước khi sử dụng để ko bị dính lông khi mang do sản phẩm nỉ mới <br>
                - Giặt mặt trong để bảo quản hình in, thêu giặt bằng tay để giữ chất lượng, màu sắc & độ bền của sản phẩm<br>
                _________________<br>
                
                FORM ÁO:<br>   
                -Size M: Ngang 60cm, Dài 65cm<br>
                -Size L: Ngang 64cm, Dài 67cm<br>
                -Size XL: Ngang 70cm, Dài 74cm<br>
                ®️ Designed by UNCOOL TEAMS.<br>
                📎 Instagram: @Deuncoolstudios.<br>
                AVAILABLE NOW<br>
                🛒 Mua ngay đi kẻo hết lạnh bây giờ<br>',
                'content' => 'Màu Red Cherry - 100% cotton mềm mịn cho nam nữ ',
                'price' => 420000,
                'qty' => 20,
                'discount' => null,
                'weight' => 1.3,
                'sku' => 213124,
                'featured' => true,
                'tag' => 'Clothing',
            ],
        ]);

        DB::table('product_images')->insert([
            [
                'product_id' => 1,
                'path' => 'product-1.jpeg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-1.jpeg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-2.jpeg',
            ],
            [
                'product_id' => 1,
                'path' => 'product-1-3.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-1.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-2.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-3.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-4.jpeg',
            ],
            [
                'product_id' => 2,
                'path' => 'product-2-5.jpeg',
            ],

            [
                'product_id' => 3,
                'path' => 'product-3.jpeg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-1.jpeg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-2.jpeg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-3.jpeg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-4.jpeg',
            ],
            [
                'product_id' => 3,
                'path' => 'product-3-5.jpeg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4.jpeg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-1.jpeg',
            ],
            [
                'product_id' => 4,
                'path' => 'product-4-2.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-1.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-2.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-3.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-4.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-5.jpeg',
            ],
            [
                'product_id' => 5,
                'path' => 'product-5-6.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-1.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-2.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-3.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-4.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-5.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-6.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-7.jpeg',
            ],
            [
                'product_id' => 6,
                'path' => 'product-6-8.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-1.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-2.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-3.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-4.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-5.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-6.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-7.jpeg',
            ],
            [
                'product_id' => 7,
                'path' => 'product-7-8.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-1.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-2.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-3.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-4.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-5.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-6.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-7.jpeg',
            ],
            [
                'product_id' => 8,
                'path' => 'product-8-8jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-1.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-2.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-3.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-4.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-5.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-6.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-7.jpeg',
            ],
            [
                'product_id' => 9,
                'path' => 'product-9-8.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-1.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-2.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-3.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-4.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-5.jpeg',
            ],
            [
                'product_id' => 10,
                'path' => 'product-10-6.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-1.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-2.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-3.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-4.jpeg',
            ],
            [
                'product_id' => 11,
                'path' => 'product-11-5.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-1.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-2.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-3.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-4.jpeg',
            ],
            [
                'product_id' => 12,
                'path' => 'product-12-5.jpeg',
            ],
        ]);

        DB::table('product_details')->insert([
            [
                'product_id' => 1,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 1,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 2,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 3,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 4,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 5,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 6,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 7,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 8,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 9,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 10,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 10,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 10,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 10,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 11,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 11,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 11,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 11,
                'size' => 'XL',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'size' => 'S',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'size' => 'M',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'size' => 'L',
                'qty' => 5,
            ],
            [
                'product_id' => 12,
                'size' => 'XL',
                'qty' => 5,
            ],
        ]);

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 4,
                'email' => 'BrandonKelley@gmail.com',
                'name' => 'Brandon Kelley',
                'messages' => 'Nice !',
                'rating' => 5,
            ],
            [
                'product_id' => 1,
                'user_id' => 5,
                'email' => 'RoyBanks@gmail.com',
                'name' => 'Roy Banks',
                'messages' => 'Nice !',
                'rating' => 5,
            ],
        ]);
    }
}

