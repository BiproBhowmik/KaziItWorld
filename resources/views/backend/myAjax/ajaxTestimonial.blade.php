  <script type="text/javascript">
            function editCommon(id) {
       // console.log("id = "+id);

      $.get('tsTmfindByIdAjax/'+id, function(responce) {
        // console.log(id);
        $('#updateCommonId').val(responce.tsTmId);
        $('#updateCommonName').val(responce.tsTmName);
        $('#updateCommonPosition').val(responce.tsTmPosition);
        $('#updateCommonSpeach').val(responce.tsTmSpeach);
        $('#updateCommonValue').val(responce.tsTmValue);
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
      url: "ajaxDeletetsTsTm/"+commonId,
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