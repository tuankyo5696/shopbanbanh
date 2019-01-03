
$("#ship-to-different-address-checkbox").change(function() {
    if(!this.checked) {
        $('#remove').css('display', 'none');
    }else{
        $('#remove').css('display', 'unset');
    }
});
$('.cart-footer').remove();
function applycoupon() {
    var coupon = $('#coupon_code').val();
    $.ajax({
        type: "POST",
        url: "coupon.php",
        dataType: 'json', 
        data: {coupon: coupon}, 
        success: function(success){
            if(success.status == true){
                $('#last_price').html(success.gia);
                alert('Sử dụng mã giảm giá thành công');
            }else{
                if(success.code == 1){
                    alert('Mã giảm giá không tồn tại');
                }else{
                    alert('vui lòng điền mã giảm giá');
                }
            }
        }
    });
}
