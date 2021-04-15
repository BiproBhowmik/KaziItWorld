  <script type="text/javascript">
            function editCommon(id) {
       // console.log("id = "+id);

      $.get('prfindByIdAjax/'+id, function(portfolio) {
        // console.log(id);
        $.get('/allClintAjax/', function(clints) {  //route to get all Clint name

          clints.forEach(element => {   //loop to show all Clint
            // console.log("id " + element['catId']);
            if (element['clId'] == portfolio.prClId) {  //condition to select the selected Clint
              $('#clntDropdown').append(`<option selected value="${element['clId']}">${element['clName']}</option>`);
            }
            else {

              $('#clntDropdown').append(`<option value="${element['clId']}">${element['clName']}</option>`);
            }
          });

          // console.log("id " + brand.catId);
        });
        $('#updateCommonTitle').val(portfolio.prTitle);
        $('#updateCommonId').val(portfolio.prId);
        $('#updateCommonDisc').val(portfolio.prDisc);
        $('#updateCommonLink').val(portfolio.prLink);
        $('#updateCommonDate').val(portfolio.prDate);
        $('#updateCommonVal').val(portfolio.prVal);
        $('#updateCommonCate').val(portfolio.prCate);
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
      url: "ajaxDeletePr/"+commonId,
      {{-- url: "{{ route('brDeleteAjax', "brId") }}", --}}
      type: 'DELETE',
      data: {
        commonId:commonId,
        _token:token,
      },
      success:function(response)
      {
        var x = document.getElementById("successTost");
                x.style.display = "block";
        $('#commonId'+commonId).remove();
        // console.log(response);

      }
    });
  }

});
  </script>