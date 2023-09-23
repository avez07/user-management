function alert_msg() {
    if (window.confirm("Are You Sure , You Want To `DELETE` This Record")) {        //single delete alert mesage
        alert("After `DELETE` You Cannot Undo");
    } else {
        return false;
    }
}
$(".selectAll").on("click", function (e) {
    let checkboxes = $("input[name='ids[]']"); //select all function

    if ($(this).is(":checked")) {
        checkboxes.prop("checked", true);
    } else {
        checkboxes.prop("checked", false);
    }
});

$(document).ready(function () {
    $("input[name='ids[]']").on("change", function () {       //insert the input feild inside the table data
        var isChecked = $(this).is(":checked");
        var $row = $(this).closest("tr");
        var $tds = $row.find("td:not(.check)");

        if (isChecked) {
            $tds.each(function (index) {
                if (index !== $tds.length - 3) {
                    var value = $(this).text().trim();
                    var inputType = getInputType(index);
                    if (inputType) {
                        var inputField;
                        if (inputType === "select") {
                            inputField = createSelectOptions(value, index);
                        } else {
                            inputField ='<input type="' + inputType + '" class="form-control" name="input_' + index +'[]" value="' + value +'">';
                        }
                        $(this).html(inputField);
                    }
                }
            });
        } else {
            $tds.each(function (index) {
                if (index !== $tds.length - 1) {
                    var value = $(this).find("input, select").val();
                    $(this).html(value);
                }
            });
        }
    });

    function getInputType(index) {      //define the type of the input feid
        switch (index) {
            case 0:
            case 2:
                return "text";
            case 1:
                return "email";
            case 4:
                return "date";
            case 5:
                return "text";
            case 3:
                return "select";
            default:
                return null;
        }
    }

    function createSelectOptions(value) {     //inserst the select option in the table data
        var selectOptions = [
            { value: "Mumbai", label: "Mumbai" },
            { value: "Pune", label: "Pune" },
            { value: "Delhi", label: "Delhi" },
            { value: "Bangalore", label: "Bangalore" },
            { value: "Chennai", label: "Chennai" },
            { value: "Kolkata", label: "Kolkata" },
            { value: "Hyderabad", label: "Hyderabad" },
            { value: "Ahmedabad", label: "Ahmedabad" },
            { value: "Jaipur", label: "Jaipur" },
            { value: "Lucknow", label: "Lucknow" },
        ];

        var selectField = '<select name="location[]" class="form-select">'; //show thw default value which is in the database
        selectOptions.forEach(function (option) {
            var selected = option.value === value ? "selected" : "";
            selectField += '<option value="' + option.value +'" ' + selected +">" + option.label +"</option>";
        });
        selectField += "</select>";

        return selectField;
    }
});

function checkIfAnyChecked(data) {
  const checkboxes = document.querySelectorAll('.check');
  let isChecked = false;

  checkboxes.forEach(checkbox => {
    if (checkbox.checked) {
      isChecked = true;
      if (data === 'deleted') {
        alert_msg();
      } else {
        return true;
      }
    }
  });

  if (!isChecked) {
    alert('Please check at least one checkbox.');
    return false;
  }


}







