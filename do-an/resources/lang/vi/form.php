<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Form Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'placeholder'   => 'Vui lòng nhập :attribute',
    'please_choose' => 'Vui lòng chọn',

    'element' => [
        'table_id'       => 'STT',
        'editor_button'  => 'Ẩn - Hiện trình soạn thảo',
        'default'        => 'Mặc định',
        'status'         => 'Trạng thái',
        'featured'       => 'Nổi bật',
        'status_enable'  => 'Hiển thị',
        'status_disable' => 'Ẩn',
        'default_yes'    => 'Có',
        'default_no'     => 'Không',
        'created_at'     => 'Tạo lúc',
        'updated_at'     => 'Sửa lúc',
        'actions'        => 'Hành động',
        'no_data'        => 'Không có dữ liệu',
        'select_all'     => 'Chọn toàn bộ',
        'deselect_all'   => 'Hủy chọn',
        'open_link'      => 'Mở liên kết',
        'access'         => 'Được phép truy cập',
        'installment'    => 'Trả góp',
        'status_enable_filter'  => 'Dùng để lọc',
        'status_disable_filter' => 'Bình thường',
    ],

    'address' => [
        'province'               => 'Tỉnh, thành',
        'district'               => 'Quận, huyện',
        'ward'                   => 'Phường, xã',
        'address'                => 'Địa chỉ',
        'please_choose_province' => 'Vui lòng chọn tỉnh, thành',
        'please_choose_district' => 'Vui lòng chọn quận, huyện',
        'please_choose_ward'     => 'Vui lòng chọn phường, xã',
    ],
    'promotion'      => [
        'main'              => 'Người viết',
        'promotion_percent' => 'Phần trăm giảm giá',
        'role_id'           => 'Phân loại người dùng',
        "enble_status"      => "Đang hoạt động",
        "disable_status"    => "Đã ngừng",
        "disable_time"      => "Hết thời gian"             
    ],
    'link' => [
        'self'   => 'Trên cùng 1 trang',
        'blank'  => 'Trên cửa sổ mới',
        'parent' => 'Trên khung cha',
        'top'    => 'Mở trình duyệt mới'
    ],
    'coupon'         => [
        'name'    => 'Tên mã',
        'percent' => 'Phần trăm',
        'code'    => 'Mã nhập',
        "status_eneble" => "Đang hoạt động",
        "status_time" => "Hết thời gian",
        "status_disblade" => "Đã ngừng",
    ],
    
    'images' => [
        'source'   => 'Hình ảnh',
        'position' => 'Vị trí hình ảnh',
        'alt'      => 'Ghi chú hình ảnh'
    ],

    'status' => [
        'in_process' => 'Đang xử lý',
        'draft'      => 'Bản nháp',
        'pending'    => 'Chờ duyệt',
        'published'  => 'Đã công bố',
        'retired'    => 'Ẩn & có tìm kiếm',
        'close'      => 'Ẩn & không tìm kiếm',
    ],

    'status_contact' => [
        'not_contacted'     => 'Chưa phản hồi',
        'dont_pickup_phone' => 'Không nhấc máy',
        'contacted'         => 'Đã phản hồi',
        'sent_mail'         => 'Đã gửi mail',
    ],

    'featured' => [
        'featured'         => 'Nổi bật',
        'most_outstanding' => 'Nổi bật nhất',
        'un_featured'      => 'Không nổi bật',  
        'combo'            => 'Combo Hot',
        'pricesock'        => 'Giá sốc mỗi ngày',
        'dealhot'          => 'Deal online hot'
    ],
    'installment' => [
        'un_installment'        => 'Không hỗ trợ trả góp',
        'payment-with-interest' => 'Trả góp có lãi suất',
        'interest-free'         => 'Trả góp lãi suất 0%'

    ],

    'seo'             => [
        'good'             => 'Tốt',
        'warning'          => 'Cảnh báo',
        'danger'           => 'Nguy hiểm',
        'slug'             => 'Liên kết',
        'title_tag'        => 'Thẻ tiêu đề',
        'meta_keywords'    => 'Thẻ từ khóa',
        'meta_description' => 'Thẻ mô tả',
        'meta_robots'      => 'Thẻ Robots',
        'meta_google_bot'  => 'Thẻ Google Bot',
        'url_tag'          => 'Thẻ liên kết',
        'image_tag'        => 'Thẻ hình ảnh',
        'iframe_tag'       => 'Thẻ iFrame',
        'important_tag'    => 'Nội dung quan trọng',
        'statistical'      => 'Thống kê',
    ],

    /** Navbar */
    'navbar'          => [
        'homepage'      => 'Trang chủ',
        'my_profile'    => 'Trang cá nhân',
        'messages'      => 'Tin nhắn',
        'config_system' => 'Cấu hình hệ thống',
        'logout'        => 'Đăng xuất',
        'support'       => 'Hỗ trợ',
        'module'        => 'Chức năng chính',
        'social'        => 'Mạng xã hội'
    ],

    /** Register Form */
    'register'        => [
        'create_account'          => 'Tạo tài khoản',
        'all_fields_are_required' => 'Tất cả thông tin dưới đây là bắt buộc',
        'email'                   => 'Email',
        'captcha'                 => 'Captcha',
        'password'                => 'Mật khẩu',
        'password_confirm'        => 'Xác nhận mật khẩu',
        'full_name'               => 'Họ và tên',
        'address'                 => 'Địa chỉ',
        'phone'                   => 'Điện thoại',
        'avatar'                  => 'Hình đại diện',
        'status'                  => 'Trạng thái',
        'level'                   => 'Quyền hạn',
        'accept_condition'        => 'Chấp nhận điều khoản',
        'receive_email_register'  => 'Nhận email khi có thông tin mới từ website',
        'accept_terms'            => 'Chấp nhận các điều khoản của dịch vụ trên website của chúng tôi',
        'create_account_button'   => 'Tạo tài khoản',
    ],

    /** Login Form */
    'login'           => [
        'login_to_your_account' => 'Đăng nhập tài khoản của bạn',
        'your_credentials'      => 'Thông tin đăng nhập của bạn',
        'email'                 => 'Email',
        'password'              => 'Mật khẩu',
        'captcha'               => 'Captcha',
        'remember'              => 'Nhớ mật khẩu',
        'forgot_password'       => 'Quên mật khẩu ?',
        'sign_in_button'        => 'Đăng nhập',
        'dont_have_an_account'  => 'Bạn chưa có tài khoản ?',
        'sign_up_button'        => 'Đăng ký',
        'or_sign_in_with'       => 'hoặc đăng nhập với',
        'policy_login'          => 'Để có thể tiếp tục bạn vui lòng xác nhận rằng bạn đã đọc <a href="#" data-toggle="modal" data-target="#modal_scrollable"> Điều khoản &amp; Điều kiện </a> và <a href="#"> Chính sách cookie </a> của Website chúng tôi',
    ],

    /** Forgot Password Form */
    'forgot'          => [
        'password_recovery'           => 'Khôi phục mật khẩu',
        'send_email_password_confirm' => 'Chúng tôi sẽ gửi bạn mail xác nhận tài khoản',
        'reset_password_button'       => 'Đặt lại mật khẩu',
        'change_password'             => 'Thay đổi mật khẩu',
        'we_will_update_pass'         => 'Chúng tôi sẽ cập nhật mật khẩu mới',
        'create_new_password'         => 'Nhập mật khẩu mới',
        'create_new_password_confirm' => 'Nhập lại xác nhận mật khẩu',
        'change_password_button'      => 'Thay đổi mật khẩu',
        'email'                       => 'Email',
        'password'                    => 'Mật khẩu',
        'password_confirm'            => 'Xác nhận mật khẩu',
    ],

    /** Role Module */
    'role'            => [
        'name'              => 'Tên nhóm phân quyền',
        'description'       => 'Mô tả phân quyền',
        'permission_manage' => 'Quản lý nhóm quyền',
        'role'              => 'Phân quyền',
        'name_placeholder'  => 'Vui lòng nhập tên nhóm phân quyền',
        'permission'        => 'Nhóm quyền',
        'all_permission'    => 'Toàn bộ quyền hạn trên website',
    ],

    /** User Module */
    'user'            => [
        'email'            => 'Email',
        'password'         => 'Mật khẩu',
        'password_confirm' => 'Xác nhận mật khẩu',
        'full_name'        => 'Họ và tên',
        'phone'            => 'Số điện thoại',
        'address'          => 'Địa chỉ',
        'level'            => 'Quyền hạn',
        'avatar'           => 'Avatar',
        'permission'       => 'Phân quyền',
        'admin'            => 'Quản trị viên',
        'member'           => 'Thành viên'
    ],

    /** Personal Module */
    'personal'        => [
        'my_profile'           => 'Thông tin của tôi',
        'email'                => 'Email',
        'current_password'     => 'Mật khẩu hiện tại',
        'new_password'         => 'Mật khẩu',
        'new_password_confirm' => 'Xác nhận mật khẩu',
        'full_name'            => 'Họ và tên',
        'phone'                => 'Số điện thoại',
        'address'              => 'Địa chỉ',
        'avatar'               => 'Avatar',
        'login_history'        => 'Lịch sử đăng nhập',
        'save_change'          => 'Lưu thay đổi',
        'login_at'             => 'Đăng nhập lúc',
        'logout_ad'            => 'Đăng xuất lúc',
        'login_ip'             => 'IP',
        'device'               => 'Thiết bị',
        'os'                   => 'Hệ điều hành',
        'browser'              => 'Trình duyệt',
        'logout'               => 'Đăng xuất'
    ],

    /** Language Module */
    'language'        => [
        'name'          => 'Tên ngôn ngữ',
        'locale'        => 'Tên viết tắt',
        'timezone'      => 'Múi giờ',
        'currency'      => 'Tiền tệ',
        'exchange_rate' => 'Tỷ giá',
        'status'        => 'Trạng thái',
        'default'       => 'Mặc định',
        'flag'          => 'Cờ quốc gia',
        'format_date'   => 'Định dạng ngày',
    ],

    /** Page Module */
    'page'            => [
        'code'    => 'Mã trang',
        'name'    => 'Tên trang',
        'content' => 'Nội dung trang',
        'locale'  => 'Ngôn ngữ',
        'update'  => 'Cập nhật'
    ],

    /** Content Module */
    'content'         => [
        'alert'             => 'Ghi chú !',
        'page_content'      => ' Nội dung trang: :page',
        'page_content_code' => ' Nội dung trang: :page với mã số trang: :code',
        'code'              => 'Mã số nội dung',
        'content'           => 'Nội dung trang',
        'image'             => 'Hình ảnh',
        'locale'            => 'Ngôn ngữ',
        'back'              => 'Quay lại trang: :page'
    ],

    /** Category Module */
    'category'        => [
        'name'        => 'Tên thể loại',
        'description' => 'Mô tả',
        'icon'        => 'Biểu tượng',
        'link'        => 'Đường dẫn truy cập',
        'locale'      => 'Ngôn ngữ',
        'position'    => 'Vị trí thể loại',
        'parent'      => 'Thể loại cha',
        'linkbanner'  => 'Link hình ảnh'
    ],

    /** News Module */
    'news'            => [
        'category'         => 'Thể loại tin',
        'title'            => 'Tiêu đề',
        'heading'          => 'Thẻ đầu đề',
        'author'           => 'Tác giả',
        'copyright'        => 'Bản quyền nội dụng',
        'intro'            => 'Tóm tắt tin (Sapo)',
        'content'          => 'Nội dung tin',
        'foot'             => 'Kết luận',
        'file'             => 'Tập tin',
        'locale'           => 'Ngôn ngữ',
        'position'         => 'Vị trí',
        'youtube'          => 'Youtube',
        'date_start'       => 'Ngày công bố',
        'time_start'       => 'Thời gian',
        'date_end'         => 'Ngày kết thúc',
        'time_end'         => 'Thời gian',
        'viewed'           => 'Lượt xem',
        'image'            => 'Hình tin',
        'template'         => 'Giao diện hiển thị',
        'detail_page'      => 'Trang chi tiết',
        'e_magazine_page'  => 'Trang E-magazine',
        'table_of_content' => 'Mục lục tin tức',
        'sale'             => 'Tin khuyến mãi',
        'recruitment'      => 'Tin tuyển dụng'
    ],

    /** Position Module */
    'position'        => [
        'name'     => 'Tên vị trí',
        'position' => 'Thứ tự vị trí',
        'width'    => 'Chiều rộng',
        'height'   => 'Chiều cao',
        'link'     => 'Liên kết',
        'image'    => 'Hình ảnh vị trí',
        'parent'   => 'Vị trí cha',
    ],

    /** Contact Module */
    'contact'         => [
        'full_name'      => 'Họ tên khách',
        'phone'          => 'Điện thoại',
        'email'          => 'Email',
        'message'        => 'Tin nhắn',
        'reply'          => 'Nội dung phản hồi',
        'guest'          => 'Khách',
        'send_1_contact' => 'đã gửi 1 liên hệ đến hệ thống hỗ trợ',
        'admin'          => 'Quản trị viên',
        'status_update'  => 'đã cập nhật trạng thái thành',
        'with_content'   => 'và với nội dung là: ',
    ],

    /** Position Module */
    'images_position' => [
        'name'           => 'Tên hình ảnh',
        'script_code'    => 'Mã code',
        'image'          => 'Hình ảnh',
        'position'       => 'Thứ tự hình ảnh',
        'video'          => 'Liên kết video',
        'description'    => 'Mô tả',
        'link'           => 'Liên kết hình ảnh',
        'position_image' => 'Vị trí hình ảnh',
        'locale'         => 'Ngôn ngữ',
    ],

    'config' => [
        'website_name'     => 'Tên Website',
        'title'            => 'Tiêu đề (Mặc định)',
        'meta_keywords'    => 'Thẻ từ khóa (Mặc định)',
        'meta_description' => 'Thẻ mô tả (Mặc định)',
        'meta_robots'      => 'Thẻ Robots (Mặc định)',
        'meta_google_bot'  => 'Thẻ Google Bot (Mặc định)',
        'copyright'        => 'Bản quyền',
        'author'           => 'Tác giả',
        'placename'        => 'Tên địa điểm',
        'region'           => 'Khu vực',
        'position'         => 'Vị trí',
        'icbm'             => 'ICBM',
        'revisit_after'    => 'Google Bot quay lại',
        'facebook'         => 'Facebook',
        'youtube'          => 'Youtube',
        'twitter'          => 'Twitter',
        'linkedin'         => 'Linkedin',
        'google_plus'      => 'Google Plus',
        'google_analytics' => 'Google Analytics',
        'google_ads'       => 'Google Ads',
        'facebook_script'  => 'Facebook Script',
        'chat'             => 'Plugin Chat (Facebook, Twakto)',
        'logo'             => 'Logo',
        'favicon'          => 'Favicon',
        'contrast_logo'    => 'Logo tương phản',
        'error_image'      => 'Hình ảnh lỗi'
    ],

    'log_error' => [
        'log_info'    => 'Thông tin nhật ký',
        'file_path'   => 'Đường dẫn tập tin',
        'log_entries' => 'Số lượng mục',
        'size'        => 'Kích thước file',
        'created_at'  => 'Tạo lúc',
        'env'         => 'Môi trường',
        'level'       => 'Mức độ',
        'time'        => 'Thời gian',
        'header'      => 'Thông tin lỗi',
        'download'    => 'Tải về',
        'delete'      => 'Xóa'
    ],

    'backup' => [
        'type'     => 'Loại lưu trữ',
        'database' => 'Sao lưu dữ liệu Website',
        'source'   => 'Sao lưu mã nguồn Website',
        'all'      => 'Sao lưu toàn bộ Website (Mã nguồn + Dữ liệu)',
        'filename' => 'Tên tập tin',
        'filesize' => 'Dung lượng tập tin',
    ],

    'activity' => [
        'user'        => 'Người dùng',
        'module'      => 'Chức năng',
        'action'      => 'Hành động',
        'description' => 'Mô tả',
        'url'         => 'Đường dẫn',
        'method'      => 'Phương thức',
        'ip'          => 'IP',
        'agent'       => 'Trình duyệt',
    ],

    'dashboard' => [
        'title'  => 'Tiêu đề',
        'viewed' => 'Lượt truy cập'
    ],

    'province' => [
        'gso_id' => 'Mã địa giới',
        'name'   => 'Tên tỉnh, thành phố',
        'fee'    => 'Phí vận chuyển'
    ],

    'district' => [
        'gso_id' => 'Mã địa giới',
        'name'   => 'Tên quân, huyện',
    ],

    'ward' => [
        'gso_id' => 'Mã địa giới',
        'name'   => 'Tên phường, xã',
    ],

    'producer' => [
        'name'        => 'Tên nhà sản xuất',
        'address'     => 'Địa chỉ',
        'phone'       => 'Số điện thoại',
        'email'       => 'Email',
        'description' => 'Mô tả',
        'image'       => 'Logo công ty',
        'locale'      => 'Ngôn ngữ'
    ],

    'attribute' => [
        'name'        => 'Tên thuộc tính',
        'description' => 'Mô tả thuộc tính',
        'position'    => 'Vị trí',
        'parent'      => 'Thuộc tính cha'
    ],

    'product' => [
        'name'        => 'Tên sản phẩm',
        'price'       => 'Giá sản phẩm',
        'discount'    => 'Giá giảm',
        'description' => 'Mô tả sản phẩm',
        'content'     => 'Nội dung sản phẩm',
        'image'       => 'Hình ảnh',
        'youtube'     => 'Video sản phẩm',
        'file'        => 'Hình ảnh trong hộp',
        'date_start'  => 'Ngày công bố',
        'time_start'  => 'Thời gian',
        'date_end'    => 'Ngày kết thúc',
        'time_end'    => 'Thời gian',
        'position'    => 'Vị trí',
        'viewed'      => 'Lượt xem',
        'template'    => 'Giao diện',
        'detail_page' => 'Trang chi tiết sản phẩm',
        'producer_id' => 'Nhà sản xuất',
        'category'    => 'Thể loại',
        'producer'    => 'Nhà sản xuất',
        'value'       => 'Giá trị thuộc tính',
        'bonus'       => 'Ưu đãi',
        'parent'      => 'Sản phẩm cũ?',
        'new_product' => 'Đây là sản phẩm mới',
        'promotion'   => 'Khuyến mãi'
    ],
    'cart'           => [
        'info'              => 'Thông tin giỏ hàng',
        'full_name'         => 'Họ tên',
        'phone'             => 'Điện thoại',
        'address'           => 'Địa chỉ',
        'type'              => 'Thể loại',
        'email'             => 'Địa chỉ Email',
        'note'              => 'Ghi Chú',
        'status'            => 'Trạng thái',
        'status_disble'     => 'Chưa thanh toán',
        'status_success'    => 'Đã thanh toán',
        'quantity'          => 'Số lượng',
        'status_transition' => 'Đã giao hàng',
        'status_cancel'     => 'Đã hủy',
        'coupon'            => 'Mã giảm giá',
        'product'           => 'Sản phẩm',
        'payment_method'    => 'Phương thức thanh toán',
        'user_id'           => 'Id người bán',
        'user_create'       => 'Người tạo',
        'price'             => 'Giá',
        'total'             => 'Tổng tiền',
        'fee'               => 'Phí vận chuyển',
        'home'              => 'Giao tại nhà',
        'store'             => 'Giao tại siêu thị',
        'name_receive'      => 'Tên người nhận',
        'phone_receive'     => 'Số điện thoại người nhận',
        'attribute'         => 'Thuộc tính',
        'delivery'          => 'Địa chỉ giao hàng',
    ],
    'status_cart'   => [
        'pending'           => 'Đang chờ duyệt',
        'success'           => 'Đã duyệt đơn',
        'delevery'          => 'Đang giao hàng',
        'success_delevery'  => 'Đã hoàn thành',
        'cancel'            => 'Hủy đơn'
    ],
    'payment_method'    => [
        'cod'          => 'Thanh toán tiền mặt khi nhận hàng',
        'tranfes'      => 'Thanh toán chuyển khoản'
    ],
    'showRoom'  =>  [
        'name'      => 'Tên ShowRoom',
        'phone'     => 'Số điện thoại',
        'address'   => 'Địa chỉ',
        'image'     => 'Hình ảnh',
        'email'     => 'Email',
        'description' => 'Link google map',
        'script'    => 'Code google map'
    ],

    'questionProduct'  =>  [
        'question'      => 'Câu hỏi',
        'answer'     => 'Câu trả lời'
    ],

    'review'  =>  [
        'name'      => 'Tên khách hàng',
        'phone'     => 'Số điện thoại',
        'email'   => 'Email',
        'description' => 'Link google map',
        'votes'     => 'Đánh giá',
        'content'   => 'Nội dung',
        'product'   => 'Sản phẩm bình luận'
    ],

];
