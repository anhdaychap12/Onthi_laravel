$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function Delete(id, url){
    if(confirm("Bạn có thực sự muốn xóa danh mục này không?")){
        $.ajax({
            type: 'DELETE',
            datatype:JSON,
            data:{id},
            url:url,
            success:function (result){
                console.log(result);
                if(result.error == 'false'){
                    alert(result.message);
                    location.reload();
                }
                else {
                    alert("Xóa danh mục không thành công");
                }
            }
        })
    }
}

function showHint(str) {
    if (str.length == 0) {
        $('#goi_y').html("không tìm thấy kết quả tìm kiếm");
    }
    else{
        $.ajax({
            type: 'POST',
            datatype:JSON,
            data:{hint: str},
            url:'/admin/sinhvien/searchAjax',
            success:function (result){
                $('#goi_y').html(result.html);
            }
        });
    }
}

function selectPage(val) {
    if (val != 0) {
        location.href = '/admin/sinhvien/list/'+val;
    }
}
