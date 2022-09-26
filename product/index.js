
function previewFile() {
    var preview = document.querySelector("img");
    var file = document.querySelector("input[type=file]").files[0];
    var reader = new FileReader();

    reader.addEventListener(
        "load",
        function () {
            preview.src = reader.result;
        },
        false
    );

    if (file) {
        reader.readAsDataURL(file);
    }
}

$(".closebtn").click(function(){
    location.reload();
});



$(document).ready(function(){

    var current_row =null;

    
    $("#frm").submit(function(event){

        event.preventDefault();
        var form = $('#frm')[0];
        var formData = new FormData(form);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data : formData,
            processData: false,
            contentType: false,
            cache:false,
            beforeSend:function(){
                $("#frm").find("input[type='submit']").val("Loading");
            },
            success:function(res){
                if(res){    
                    if($("#uid").val()=="0"){
                        $("#tbody").append(res);
                    }else{
                        $(current_row).html(res);
                    }

                }else{
                    alert("Failed Try Again...");
                }
                $("#frm").find("input[type='submit']").val("Submit");
                clear_input();

                location.reload();
                       
            }

            
            
        });
        
    });

    $("body").on("click",".edit",function(event){
        event.preventDefault();

        current_row = $(this).closest("tr");

        var id = $(this).closest("tr").attr("uid");
        var name = $(this).closest("tr").find("td:eq(1)").text();
        var type = $(this).closest("tr").find("td:eq(2)").text();
        var image = $(this).closest("tr").find("td:eq(3)").attr('src');

        console.log(image);


        $("#action").val("Update");
        $("#uid").val(id);
        $("#name").val(name);
        $("#description").val(type);
        $("#imagePreview").attr('src',image);

        $("#frm").find("input[type='submit']").val("Update");




        


        
    });

    $("body").on("click",".delete",function(event){
        event.preventDefault();
        var id = $(this).closest("tr").attr("uid");
        var cls = $(this);

        if(confirm('Are you Sure want to Delete?')){
            $.ajax({
                url: "ajax.php",
                type: "post",
                data : {uid:id,action:'Delete'},
                beforeSend:function(){
                    $(cls).text("Loading")
                },
                success:function(res){
                    if(res){
                        $(cls).closest("tr").remove();
                    }else{
                        alert('Failed Try again');
                        $(cls).text("try again")
                    }                                     
                }
            });
        }
    });
    function clear_input(){
        $("#frm").find(".did-floating-input").val("");
        $("#action").val("Insert");
        $("#uid").val("0");


        
    }    
});