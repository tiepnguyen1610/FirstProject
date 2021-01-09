$(document).ready(function() {
    $('#dataTables-example').DataTable({
            responsive: true
    });
});

$("div.alert").delay(3000).slideUp();


// var showInput = document.querySelector('#myImage');

// showInput.onclick = function(e){
// 	alert('123');
// }
// $(document).on('click', 'fImage', function () {
//     let fileInput = $(this).parent().find('input');
//     fileInput.trigger('click');
// });

// $(document).on('change', 'input[type=file]', function () {
//     let target = $(this).closest('.form-group').find('fImage');
//     previewImage(this, target);
// });

//  $(function () {
//         $(".form-group").change(function () {
//             // alert($(this).data('id-image'))
//             $("#changedImageIds").val($("#changedImageIds").val() + ',' + $(this).data('id-image'));
//         })
// });