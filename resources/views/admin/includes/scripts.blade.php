


{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- bootstrap script  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


{{-- Select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.single-select2').select2();
    });
</script>


{{-- DatePicker plugin --}}
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        showOtherMonths: true
    });
</script>

{{-- sidebar dropdown menu --}}
<script>
    $(function(){
        var $ul   =   $('.sidebar-navigation > ul');
        
        $ul.find('li a').click(function(e){
            var $li = $(this).parent();
            
            if($li.find('ul').length > 0){
            e.preventDefault();
            
            if($li.hasClass('selected')){
                $li.removeClass('selected').find('li').removeClass('selected');
                $li.find('ul').slideUp(400);
                $li.find('a em').removeClass('mdi-flip-v');
            }else{
                
                if($li.parents('li.selected').length == 0){
                    $ul.find('li').removeClass('selected');
                    $ul.find('ul').slideUp(400);
                    $ul.find('li a em').removeClass('mdi-flip-v');
                }else{
                    $li.parent().find('li').removeClass('selected');
                    $li.parent().find('> li ul').slideUp(400);
                    $li.parent().find('> li a em').removeClass('mdi-flip-v');
                }
                
                $li.addClass('selected');
                $li.find('>ul').slideDown(400);
                $li.find('>a>em').addClass('mdi-flip-v');
            }
            }
        });
        
        
        $('.sidebar-navigation > ul ul').each(function(i){
            if($(this).find('>li>ul').length > 0){
            var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
            var pIntPLeft   = parseInt(paddingLeft);
            var result      = pIntPLeft + 20;
            
            $(this).find('>li>a').css('padding-left',result);
            }else{
            var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
            var pIntPLeft   = parseInt(paddingLeft);
            var result      = pIntPLeft + 20;
            
            $(this).find('>li>a').css('padding-left',result).parent().addClass('selected--last');
            }
        });
        
        var t = ' li > ul ';
        for(var i=1;i<=10;i++){
            $('.sidebar-navigation > ul > ' + t.repeat(i)).addClass('subMenuColor' + i);
        }
        
        var activeLi = $('li.selected');
        if(activeLi.length){
            opener(activeLi);
        }
        
        function opener(li){
            var ul = li.closest('ul');
            if(ul.length){
            
                li.addClass('selected');
                ul.addClass('open');
                li.find('>a>em').addClass('mdi-flip-v');
            
                if(ul.closest('li').length){
                    opener(ul.closest('li'));
                }else{
                    return false;
                }
            
            }
        }
        
    });
</script>

{{-- Sidebar active --}}
<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function(){
        sidebar.classList.toggle("active");
    }
</script>


<!-- Common Scripts -->
<script>
    var SITEURL = "{{ URL::to('') }}";
    $( document ).ready( function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var SITEURL = "{{ URL::to('') }}";
        var ASSET_URL = "{{ config('app.asset_url') }}/";
    });
</script>


<script>
    function setProfileImage(e, image){
        if(image){
            $('#profileImage').attr('src', e.target.result ).show();
            $('#sidebarImage').attr('src', e.target.result ).show();
            $('#sidebarImage').removeClass('d-none');
            $('#profileImage').removeClass('d-none');

            $('.profile-icon').addClass('d-none');
            $('#profileImageDB').addClass('d-none');
            $('#sidebarImageDB').addClass('d-none');
        }else{
            $('#profileImage').addClass('d-none');
            $('#sidebarImage').addClass('d-none');

            $('.profile-icon').removeClass('d-none');
            $('#profileImageDB').removeClass('d-none');
            $('#sidebarImageDB').removeClass('d-none');
        }
    }
</script>



    
