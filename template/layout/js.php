<script type="text/javascript" src="assets/slick/slick/slick.js"></script>
<script type="text/javascript" src="assets/slick/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/textillate/0.4.0/jquery.textillate.min.js"></script>

<script>
    $(document).ready(function () {
        function startAnimation() {
            $('.tel-link').textillate({
                in: {
                    effect: 'fadeIn',   // Hiệu ứng fade in cho từng chữ số
                    delayScale: 1.5,    // Tăng tốc độ delay giữa các ký tự
                    delay: 50,          // Đặt độ trễ giữa các chữ số
                    sync: false,        // False để mỗi ký tự có hiệu ứng riêng
                    shuffle: false      // Không xáo trộn các ký tự
                },
                out: {
                    effect: 'fadeOut',  // Hiệu ứng fade out để ẩn đi
                    delayScale: 1.5,
                    delay: 50,
                    sync: false,
                    shuffle: false
                },
                loop: true            // Lặp lại hiệu ứng liên tục
            });
        }
        // Gọi startAnimation ban đầu
        startAnimation();
    });
</script>

<script>
    $('.doitac-list').slick({
        autoplay: true,  // Tự động chạy
        autoplaySpeed: 2000, // Chạy mỗi 2 giây
        arrows: true,   // Ẩn nút điều hướng
        slidesToShow: 6,
        responsive: [
            {
                breakpoint: 768, // Màn hình nhỏ hơn 768px (sm)
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 992, // Màn hình nhỏ hơn 992px (md)
                settings: {
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 1200, // Màn hình lớn hơn 1200px (lg)
                settings: {
                    slidesToShow: 4,
                }
            }
        ]
    });
    $('.tieuchi-list').slick({
        autoplay: true,  // Tự động chạy
        autoplaySpeed: 2000, // Chạy mỗi 2 giây
        arrows: false,   // Ẩn nút điều hướng
        slidesToShow: 4,
        responsive: [
            {
                breakpoint: 768, // Màn hình nhỏ hơn 768px (sm)
                settings: {
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 992, // Màn hình nhỏ hơn 992px (md)
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 1200, // Màn hình lớn hơn 1200px (lg)
                settings: {
                    slidesToShow: 3,
                }
            }
        ]
    });
</script>