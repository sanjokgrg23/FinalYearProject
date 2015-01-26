<script language="javascript" type="text/javascript">
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}
</script>
<script type="text/javascript">
$(function(){
  $('#vidyagames').tokenInput([
      {id: "Business ", name: " Business"},
      {id: "Economics", name: "Economics"},
      {id: "Macroeconomics", name: " Macroeconomics"},
      {id: "MicroEconomics", name: "MicroEconomics"},
      {id: "Finance", name: " Finance"},
      {id: "Inflation", name: " Inflation"},
      {id: "maths", name: " Maths"},
      {id: "GeoMetry", name: " GeoMetry"},
      {id: "Arithmetic", name: " Arithmetic"},
      {id: "Algebra", name: " Algebra"},
      {id: "Programming", name: " Programming"},
      {id: "Java", name: " Java"},
      {id: "C#", name: " C#"},
      {id: "Asp.net", name: "Asp.net"},
      {id: "HTML", name: "HTML"},
      {id: "php", name: " php"},
      {id: "css", name: " css"},
      {id: "javascript", name: " javascript"},
      {id: "perl", name: " Perl"},
      {id: "Ruby", name: " Ruby"},
      {id: "Class", name: " Class"},
      {id: "ObjectOriented", name: " ObjectOriented"},
      {id: "OOp", name: " OOP"},
      {id: "Rails", name: " Rails"},
 
    ], { 
      theme: "facebook",
      hintText: "Type words that describes your Question",
      noResultsText: "Sorry No results",
      searchingText: "Searching...",
      preventDuplicates: true
  }); 

});
</script>

<div class="container">
   <h1>Ask a Question</h1>
   <i>Remember to post appropriate and logical and explain your questions clearly. Inappropriate questions will be removed immediately by the admin</i>
   <div class="col-md-8">
    <div class="form-horizontal">
      <fieldset>
   <?php
        $this->load->helper("form");
        echo validation_errors();


        echo form_open('questions/validate_question');
   ?>
    <p><h2>Question title</h2></p>
    <p>
    <div class="form-group"><input class="form-control" type="text" name="input_title" id="input_title" 
    onKeyDown="limitText(this.form.input_title,this.form.countdown,80);" 
    onKeyUp="limitText(this.form.limitedtextfield,this.form.countdown,80);" maxlength="80"
    placeholder="what is your question please be specific and clear"></div>
    </p>
    <p>You have <input readonly type="text" name="countdown" size="3" value="80"> characters left.</p>
    <p><h3>Now Describe in detail!</h3><p>
      <div class="form-group">
      <textarea id="message" class="form-control" name="message" rows="10px" cols="86px"></textarea>
      </div>
    </p>
    <p><h3>Tags</h3></p><p><input type="text" id="vidyagames" name="vidya"></p>
    <p>
      <div class="form-group">
         <div class="col-lg-10 col-lg-offset-0">
          <input type="submit" name="submit" value="Submit Your Question" class="btn btn-primary">
         </div>
      </div>
    </p>
     </form>
      </fieldset>
    </div>
   </div>
</div>