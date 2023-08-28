<x-app-layout>  
    <style>
      .table-border{
        border: 1px solid black;
      }
    </style>

   {{-- @dd(public_path('images/'.$images->image[0]['path'])) --}}
    <div class="table-border">
      <form action="{{route('quotation.store')}}" method="POST" name="create_quotation_form" id="create_quotation_form">
        @csrf
        <table class="border-4 border-green-500 border-spacing-2" width="100%">
          <tr>
              <td class="border-4 border-slate-300 p-2">
                  <input type="hidden" value="{{$images->id}}" name="prescription_id" id="prescription_id">
                  <table class="border-collapse table-auto border border-black border-spacing-4" >
                          <div class="mx-auto mb-4 max-w-sm bg-white border border-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                              <a href="#">
                                  <img class="rounded-t-lg m-2" height="70%" id="image0" onclick="change_image(0)" width="60%" src="{{URL('images/'.$images->prescriptionImage[0]['img_path'])}}" class="mx-auto" alt="" />
                              </a>
                          </div>
                      <tr class="mx-auto">
                          <td class="border border-slate-300"><a href=""> <img id="image1" onclick="change_image(1)" height="40%" width="60%" src="{{ isset($images->prescriptionImage[1]) ? URL('images/'.$images->prescriptionImage[1]['img_path']) : null }}" class="mx-auto box-border h-32 w-32 p-2 border-4" alt=""></a></td>
                          <td class="border border-slate-300"><a href=""> <img id="image2" onclick="change_image(2)" height="40%" width="60%" src="{{ isset($images->prescriptionImage[2]) ? URL('images/'.$images->prescriptionImage[2]['img_path']) : null}}" class="mx-auto box-border h-32 w-32 p-2 border-4" alt=""></a></td>
                          <td class="border border-slate-300"><a href=""> <img id="image3" onclick="change_image(3)" height="40%" width="60%" src="{{ isset($images->prescriptionImage[3]) ? URL('images/'.$images->prescriptionImage[3]['img_path']) : null}}" class="mx-auto box-border h-32 w-32 p-2 border-4" alt=""></a></td>
                          <td class="border border-slate-300"><a href=""> <img id="image4" onclick="change_image(4)" height="40%" width="60%" src="{{ isset($images->prescriptionImage[4]) ? URL('images/'.$images->prescriptionImage[4]['img_path']) : null}}" class="mx-auto box-border h-32 w-32 p-2 border-4" alt=""></a></td>
                      </tr>
                  </table>
              </td>
              <td class="border-4 border-slate-300  p-5">
                  <table  >
                      <tr>
                         <td class="border-2 border-slate-400 w-80 h-80">
                          <table id="table" class="text-sm text-left text-gray-500 dark:text-gray-400 ml-10">
                                  <input type="hidden" id="images_id" name="images_id" value="{{$images->prescriptionImage[0]['img_path']}}">
                              <thead class="text-sm text-gray-700 uppercase  dark:text-gray-400">
                                  <tr>
                                      <th class="pr-2 pl-4">Drug</th>
                                      <th class="px-3">Quantity</th>
                                      <th class="px-3">Amount</th>
                                  </tr>
                              </thead>
                              <tbody>
  
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <td colspan="2" class="pt-5 pl-20">Total</td>
                                      <td class="pt-5"><input type="text" name="total" id="total" class="outline-none border-none"></td>
                                  </tr>
                              </tfoot>
                          </table>
                         </td>
  
                      <tr>
                          <td>
                              <div>
                                  <div class="flex justify-end p-2">
                                      <label for="drug" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">DRUG</label>
                                      <select name="drug" id="drug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Drug" required>
                                                  <option value="">Select a Drug</option>
                                              @foreach ($drugs as $key => $drug)
                                                  <option data-value="{{$drug['name']}}" data-id="{{$drug['id']}}" value="{{$drug['price']}}">{{$drug['name']}}</option>
                                              @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div >
                                  <div class="flex justify-end p-2">
                                      <label for="quantity" class="mb-2 text-sm font-medium text-gray-900 dark:text-white px-3 py-2">QUANTITY</label>
                                      <input type="number" id="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg w-80 focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Add Quantity" required>
                                  </div>
                              </div>
                              <div class="flex justify-end p-2">
                                  <button onclick="load_table(event)" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 text-center">ADD</button>
                              </div>
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
          <tr>
             <td colspan="2" class="border-4 border-slate-300 px-2 py-4">
                  <div class="flex justify-end mx-5">
                      <input type="hidden" id="count" name="count" value="">
                      <button class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg w-80 text-sm py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="form_submit(event, 'add','create_quotation_form')">SEND QUOTATION</button>
                  </div>
             </td>
          </tr>
      </table>
      </form>
    </div>
  
    <script>
      var tot_amount = 0;
      var count = 1;
      function load_table(event)
      {
          event.preventDefault();
  
          var drug = parseInt($('#drug').val());
          var drug_name = $('#drug').find('option:selected').attr("data-value");
          var drug_id = $('#drug').find('option:selected').attr('data-id')
          var quantity = parseInt($('#quantity').val());
          var total = drug * quantity;
          tot_amount += total;
          $('#total').val(tot_amount);
          
          //append table rows
          $('#table').append('<tr> <td><input type="hidden" name="drug_id[]" id="drug_id_'+count+'" value='+drug_id+'>'+drug_name+'</td> <td><input type="hidden" name="quantity[]" id="quantity_'+count+'" value='+quantity+'>'+quantity+'</td> <td>'+total+'</td></tr>')
          $('#count').val(count);
          count++;
      }
  
      function form_validation()
      {
          valid = true;
  
          if($('#drug_id_'+1).val() == ' ' && $('#quantity_'+1).val() == ' ')
          {
              valid = false;
          }
  
          return valid;
      }
  
      function form_submit(event, button_id, form_id)
      {
          event.preventDefault();
          if(!parseInt($('#drug').find('option:selected').attr('data-id')) == '' && !parseInt($('#quantity').val()) == '')
          {
                  count = $('#count').val();
                  var prescription_id = $('#prescription_id').val();
  
                      if(form_validation())
                      {
                          $.ajax({
                              type:'POST',
                              url: "{{route('quotation.store')}}",
                              headers: {
                                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').prop('create_quotation_form')
                                      },
                              data: $('#create_quotation_form').serialize(),
                              success: function(data){
                                window.location.href= '{{route('dashboard')}}';
                                }
                          });
                      }else{
                          alert('No data to save');
                      }       
          }else{
              alert("drug and quantity can't be empty");
          }
      }

        function change_image(clickedImageNum) {
            var firstImageSrc = $('#image0').attr('src');

            $('#image0').attr('src', $('#image' + clickedImageNum).attr('src'));

            $('#image' + clickedImageNum).attr('src', firstImageSrc);
        }

    </script>
  
  </x-app-layout>