  <script type="text/javascript">
    {{-- Ajax Brand Insert --}}
    $("#commonAddForm").submit(function(event) {
      event.preventDefault();

      let commonClass = $("#commonClass").val();
      let commonTitle = $("#commonTitle").val();
      let commonDisc = $("#commonDisc").val();
      let commonValue = $("#commonValue").val();
      let _token = $("input[name=_token]").val();
        
       // console.log(commonClass);
       // console.log(commonTitle);
       // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxAddOS') }}",
          type: "POST",
          data:{
            commonClass:commonClass,
            commonTitle:commonTitle,
            commonDisc:commonDisc,
            commonValue:commonValue,
            _token:_token
          },
          success:function(response)
          {
            if (response) {
                $("#commonAddForm")[0].reset();

              $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.osIco+'</td><td>'+response.osTitle+'</td><td>'+response.osDisc+'</td><td>'+response.osVal+'</td><td>'+"Added"+'</td></tr>');

              //console.log(response);

              //For Toster
                var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

        {{-- Ajax Brand Update --}}
    $("#updateCommonAddForm").submit(function(event) {
      event.preventDefault();

      let updateCommonId = $("#updateCommonId").val();
      let updateCommonClass = $("#updateCommonClass").val();
      let updateCommonTitle = $("#updateCommonTitle").val();
      let updateCommonDisc = $("#updateCommonDisc").val();
      let updateCommonValue = $("#updateCommonValue").val();
      let _token = $("input[name=_token]").val();
        
       // console.log(updateCommonId);
       // console.log(updateCommonClass);
       // console.log(updateCommonTitle);
       // console.log(updateCommonDisc);
       // console.log(updateCommonValue);
       // console.log(_token);

        $.ajax({
        url: "{{ route('ajaxUppOS') }}",
          type: "POST",
          data:{
            updateCommonId:updateCommonId,
            updateCommonClass:updateCommonClass,
            updateCommonTitle:updateCommonTitle,
            updateCommonDisc:updateCommonDisc,
            updateCommonValue:updateCommonValue,
            _token:_token
          },
          success:function(response)
          {
            if (response) {
              // console.log(response);

              $("#commonId"+response.osId+' td:nth-child(2)').text(response.osIco);
              $("#commonId"+response.osId+' td:nth-child(3)').text(response.osTitle);
              $("#commonId"+response.osId+' td:nth-child(4)').text(response.osDisc);
              $("#commonId"+response.osId+' td:nth-child(5)').text(response.osVal);
              $("#commonUpdateModal").modal('toggle');

                $("#updateCommonAddForm")[0].reset();

              // $("#datatable tbody").prepend('<tr><td>'+"New"+'</td><td>'+response.osIco+'</td><td>'+response.osTitle+'</td><td>'+response.osDisc+'</td><td>'+response.osVal+'</td><td>'+"Added"+'</td></tr>');


              //For Toster
                var x = document.getElementById("successTost");
                x.style.display = "block";

            }
          }
        });
      });
    {{-- Ajax Brand Insert --}}

    
      function editCommon(id) {
       //console.log("id = "+id);

      $.get('osfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.osId);
        $('#updateCommonTitle').val(responce.osTitle);
        $('#updateCommonDisc').val(responce.osDisc);
        $('#updateCommonClass').val(responce.osIco);
        $('#updateCommonValue').val(responce.osVal);
        $('#commonUpdateModal').modal("toggle");
    });
  }

  {{-- Ajax Brand Delete --}}
    $(".commonDelete").click(function(){

      $confirm = confirm("Delete!");

      if ($confirm) {
        var commonId = $(this).data("id");
        var token = $("meta[name='csrf-token']").attr("content");

     // console.log(commonId);
     // console.log(token);
    
    $.ajax(
    {
      url: "ajaxDeleteOS/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        $('#commonId'+commonId).remove();
        var x = document.getElementById("successTost");
                x.style.display = "block";

      }
    });
  }

});
  </script>