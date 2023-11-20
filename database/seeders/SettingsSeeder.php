<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            'description' => 'GreenEcom, một sàn thương mại điện tử tiên phong, cam kết hướng tới sự phát triển bền vững và thân thiện với môi trường. Chúng tôi không chỉ là một cổng thông tin mua sắm trực tuyến; chúng tôi là một phong trào, một lời kêu gọi hành động để bảo vệ hành tinh của chúng ta thông qua quyết định mua sắm có ý thức. Tại GreenEcom, mỗi sản phẩm được lựa chọn cẩn thận không chỉ vì chất lượng và thiết kế của nó, mà còn vì cách chúng được sản xuất và tác động môi trường của chúng.

            Chúng tôi hợp tác với các thương hiệu và nhà sản xuất hàng đầu, những người chia sẻ tầm nhìn về một tương lai bền vững. Từ thời trang, đồ gia dụng, đến thực phẩm và mỹ phẩm, mỗi sản phẩm trên GreenEcom được chứng nhận là thân thiện với môi trường, hỗ trợ công bằng xã hội và thúc đẩy các chuỗi cung ứng bền vững.

            Chúng tôi tin rằng mỗi lựa chọn mua sắm có thể góp phần tạo nên sự khác biệt. Vì vậy, chúng tôi cung cấp một nền tảng thông tin giáo dục toàn diện, giúp khách hàng hiểu rõ hơn về tác động môi trường và xã hội của từng sản phẩm. GreenEcom không chỉ là nơi bạn tìm thấy sản phẩm bền vững; đó là nơi bạn trở thành phần của cộng đồng toàn cầu nhằm thúc đẩy sự thay đổi tích cực.',
            'short_des' => 'GreenEcom - Nền tảng thương mại điện tử hàng đầu, chú trọng phát triển bền vững và bảo vệ môi trường. Mỗi sản phẩm được tuyển chọn không chỉ dựa trên chất lượng và thiết kế, mà còn dựa trên nguyên tắc bảo vệ môi trường và công bằng xã hội. Hãy cùng GreenEcom biến mỗi quyết định mua sắm thành bước tiến vì một tương lai xanh và bền vững hơn.

            ',
            'logo' => 'upload/logo.png', // Thay thế với đường dẫn thực tế của logo
            'photo' => 'settings/logo.png', // Thay thế với đường dẫn thực tế của hình ảnh
            'address' => 'Địa chỉ của GreenEcom',
            'phone' => '0935769312',
            'email' => 'egreen.makemoney@ecommerce.com',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
