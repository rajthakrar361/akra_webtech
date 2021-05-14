function ageCalculator() {
    var userinput = document.getElementById("birth_date").value;
    var dob = new Date(userinput);
    if(userinput==null || userinput=='') {
      document.getElementById("message").innerHTML = "**Choose a date please!";
      return false;
    } else {

    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();

    //convert the calculated difference in date format
    var age_dt = new Date(month_diff);

    //extract year from date
    var year = age_dt.getUTCFullYear();

    //now calculate the age of the user
    var age = Math.abs(year - 1970);

    //display the calculated age
    if(age>=18){
      document.getElementById("age").value = age;
    }
    else{
      document.getElementById("age").value = "Only Age of 18+ is allowed for vaccination";
    }


    if(age>=45){
      document.getElementById("age18").disabled = true;
      document.getElementById("age45").disabled = false;
      btn = document.getElementById("age45");
      btn.checked = true;
    }
    else if(age>18 && age<45){
      document.getElementById("age45").disabled = true;
      document.getElementById("age18").disabled = false;
      btn = document.getElementById("age18");
      btn.checked = true;
    }
  }
}
