function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cover_image')
                .attr('src', e.target.result).removeClass('invisible').width(300);
        };

        reader.readAsDataURL(input.files[0]);
    }
};

$("#deleteButton").on("click",function(e){
	$("#deleteForm").submit();
});