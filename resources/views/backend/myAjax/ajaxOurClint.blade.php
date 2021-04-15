  <script type="text/javascript">
      function editCommon(id) {
       //console.log("id = "+id);

      $.get('clfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.clId);
        $('#updateCommonName').val(responce.clName);
        $('#updateCommonValue').val(responce.clVal);
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
      url: "ajaxDeleteCl/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        $('#commonId'+commonId).remove();
        // console.log(response);

        //For Toster
        var x = document.getElementById("successTost");
        x.style.display = "block";
      }
    });
  }

});
  </script>