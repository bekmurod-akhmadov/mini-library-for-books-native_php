$(document).ready(function (e) {

    $('.upload').change(function(){
        var input = this;
        var url = $(this).val();
        var targetImage = $(this).parent().find('img');
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
        {
            var reader = new FileReader();

            reader.onload = function (e) {
                targetImage.attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
        else
        {
            alert("Faqat rasm yuklashingiz mumkin!");
            targetImage.attr('src', '/uploads/no-image.png');
        }
    });

////////////////////////Menu functions/////////////////////////////
    let buttons = document.querySelectorAll('.del');
    for(let i=0;i < buttons.length;i++){
        buttons[i].addEventListener('click',function (e) {
            let err =confirm("Ma'lumot o'chirilsinmi?");
            if(!err){
                e.preventDefault();
                return false;
            }
        })
    }

    function green(){
        document.querySelector('.greenAlert').classList.add('active');
    }
    setTimeout(green,2000);

    $("[name='status-news']").bootstrapSwitch();
    $("[name='actual']").bootstrapSwitch();
})