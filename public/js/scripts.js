/*!
 * Start Bootstrap - SB Admin v7.0.3 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", event => {
  // Toggle the side navigation
  const sidebarToggle = document.body.querySelector("#sidebarToggle")
  if (sidebarToggle) {
    // Uncomment Below to persist sidebar toggle between refreshes
    // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
    //     document.body.classList.toggle('sb-sidenav-toggled');
    // }
    sidebarToggle.addEventListener("click", event => {
      event.preventDefault()
      document.body.classList.toggle("sb-sidenav-toggled")
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      )
    })
  }
})

// $(".toggle-password").click(function () {
//   $(this).toggleClass("fa-eye fa-eye-slash")
//   var input = $($(this).attr("toggle"))
//   if (input.attr("type") == "password") {
//     input.attr("type", "text")
//   } else {
//     input.attr("type", "password")
//   }
// })

// Barangay Detail
function triggerClick() {
  document.querySelector("#formLogo").click()
}

function displayLogo(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#logoDisplay")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// Change content
function triggerClickContent() {
  document.querySelector("#formContent").click()
}

function displayContent(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#contentDisplay")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}
// CLearance id pic
function clearancetriggerClick() {
  document.querySelector("#formIdPic").click()
}

function displayId(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#idPicDisplay")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// Resident pic
function residentTriggerClick() {
  document.querySelector("#addResident").click()
}

function displayResident(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#addDisplayResident")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// edit Resident pic
function editResidentTriggerClick() {
  document.querySelector("#editResident").click()
}

function editedDisplayResident(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#editDisplayResident")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// Profile pic
function profileTriggerClick() {
  document.querySelector("#profile").click()
}

function displayProfile(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#profileDisplay")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// verify account
function frontIdTriggerClick() {
  document.querySelector("#frontId").click()
}

function displayFrontId(e) {
  if (e.files[0]) {
    var reader = new FileReader()

    reader.onload = function (e) {
      document
        .querySelector("#frontIdDisplay")
        .setAttribute("src", e.target.result)
    }
    reader.readAsDataURL(e.files[0])
  }
}

// Certification
// $("#load")
//   .on("change", function () {
//     $("#send").prop("disabled", !$(this).val())
//   })
//   .trigger("change")

$(function () {
  $("#load").change(function () {
    var modalSelect = $("#load option:selected").text()
    console.log(modalSelect)
    if (modalSelect == "Barangay Indigency") {
      $("#send").attr("data-bs-target", "#modalIndigency")
    } else if (modalSelect == "Barangay Permit") {
      $("#send").attr("data-bs-target", "#modalPermit")
    } else if (modalSelect == "Barangay Residency") {
      $("#send").attr("data-bs-target", "#modalResidency")
    } else if (modalSelect == "Barangay Clearance") {
      $("#send").attr("data-bs-target", "#modalClearance")
    } else if (modalSelect == "Barangay Clearance-with-ID") {
      $("#send").attr("data-bs-target", "#modalClearanceId")
    }
  })
})
// Print page
function printDiv(divName) {
  var printContents = document.getElementById(divName).innerHTML
  var originalContents = document.body.innerHTML

  document.body.innerHTML = printContents

  window.print()

  document.body.innerHTML = originalContents
}

// Purpose Select
function toggleField(hideObj, showObj) {
  hideObj.disabled = true
  hideObj.style.display = "none"
  showObj.disabled = false
  showObj.style.display = "inline"
  showObj.focus()
}

// REQUEST SECTION
$(document).ready(function () {
  $(".indigencybtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/indigency",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#indigencyId").val(data.id)
        $("#indigencyControl").val(data.control)
        $("#indigencyLastName").val(data.last_name)
        $("#indigencyFirstName").val(data.first_name)
        $("#indigencyMiddleName").val(data.middle_name)
        $("#indigencySuffix").val(data.suffix)
        $("#indigencyContactNum").val(data.contact_number)
        $("#indigencyPurpose").val(data.purpose)
        $("#indigencyQty").val(data.qty)
        $("#indigencyFeedback").val(data.feedback)
      }
    })
  })
})

// indigency view only
$(document).ready(function () {
  $(".indigencybtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/indigency",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#indigencyId").val(data.id)
        $("#indigencyControl").val(data.control)
        $("#indigencyLastName").text(data.last_name)
        $("#indigencyFirstName").text(data.first_name)
        $("#indigencyMiddleName").text(data.middle_name)
        $("#indigencySuffix").text(data.suffix)
        $("#indigencyContactNum").text(data.contact_number)
        $("#indigencyFormType").text(data.form_type)
        $("#indigencyFormTypeValue").val(data.form_type)
        $("#indigencyPurpose").text(data.purpose)
        $("#indigencyQty").text(data.qty)
        $("#indigencyFeedback").val(data.feedback)
      }
    })
  })
})

$(document).ready(function () {
  $(".permitbtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/permit",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#permitId").val(data.id)
        $("#permitControl").val(data.control)
        $("#permitLastName").val(data.last_name)
        $("#permitFirstName").val(data.first_name)
        $("#permitMiddleName").val(data.middle_name)
        $("#permitSuffix").val(data.suffix)
        $("#permitOperLastName").val(data.oper_lastname)
        $("#permitOperFirstName").val(data.oper_firstname)
        $("#permitOperMiddleName").val(data.oper_middlename)
        $("#permitOperSuffix").val(data.oper_suffix)
        $("#permitBusinessName").val(data.business_name)
        $("#permitContactNum").val(data.contact_number)
        $("#permitPurpose").val(data.purpose)
        $("#permitQty").val(data.qty)
        $("#permitFeedback").val(data.feedback)
      }
    })
  })
})

// permit view only
$(document).ready(function () {
  $(".permitbtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/permit",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#permitId").val(data.id)
        $("#permitControl").val(data.control)
        $("#permitLastName").text(data.last_name)
        $("#permitFirstName").text(data.first_name)
        $("#permitMiddleName").text(data.middle_name)
        $("#permitSuffixView").text(data.suffix)
        $("#permitFormType").text(data.form_type)
        $("#permitFormTypeValue").val(data.form_type)
        $("#permitOperLastName").text(data.oper_lastname)
        $("#permitOperFirstName").text(data.oper_firstname)
        $("#permitOperMiddleName").text(data.oper_middlename)
        $("#permitOperSuffixView").text(data.oper_suffix)
        $("#permitBusinessName").text(data.business_name)
        $("#permitContactNum").text(data.contact_number)
        $("#permitPurpose").text(data.purpose)
        $("#permitQty").text(data.qty)
        $("#permitFeedback").val(data.feedback)
      }
    })
  })
})

$(document).ready(function () {
  $(".residencybtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/residency",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#residencyId").val(data.id)
        $("#residencyControl").val(data.control)
        $("#residencyLastName").val(data.last_name)
        $("#residencyFirstName").val(data.first_name)
        $("#residencyMiddleName").val(data.middle_name)
        $("#residencySuffix").val(data.suffix)
        $("#residencyGender").val(data.gender)
        $("#residencyBirthDate").val(data.birth_date)
        $("#residencyBirthPlace").val(data.birth_place)
        $("#residencyFaLastName").val(data.father_lastname)
        $("#residencyFaFirstName").val(data.father_firstname)
        $("#residencyFaMiddleName").val(data.father_middlename)
        $("#residencyFaSuffix").val(data.father_suffix)
        $("#residencyMoMaidenName").val(data.mother_maidenname)
        $("#residencyMoFirstName").val(data.mother_firstname)
        $("#residencyMoMiddleName").val(data.mother_middlename)
        $("#residencyMoSuffix").val(data.mother_suffix)
        $("#residencyContactNum").val(data.contact_number)
        $("#residencyPurpose").val(data.purpose)
        $("#residencyQty").val(data.qty)
        $("#residencyFeedback").val(data.feedback)
      }
    })
  })
})

// view residency only
$(document).ready(function () {
  $(".residencybtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/residency",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#residencyId").val(data.id)
        $("#residencyControl").val(data.control)
        $("#residencyLastName").text(data.last_name)
        $("#residencyFirstName").text(data.first_name)
        $("#residencyMiddleName").text(data.middle_name)
        $("#residencySuffix").text(data.suffix)
        $("#residencyGender").text(data.gender)
        $("#residencyBirthDate").text(data.birth_date)
        $("#residencyBirthPlace").text(data.birth_place)
        $("#residencyFaLastName").text(data.father_lastname)
        $("#residencyFaFirstName").text(data.father_firstname)
        $("#residencyFaMiddleName").text(data.father_middlename)
        $("#residencyFaSuffixView").text(data.father_suffix)
        $("#residencyMoMaidenName").text(data.mother_maidenname)
        $("#residencyMoFirstName").text(data.mother_firstname)
        $("#residencyMoMiddleName").text(data.mother_middlename)
        $("#residencyMoSuffixView").text(data.mother_suffix)
        $("#residencyContactNum").text(data.contact_number)
        $("#residencyPurpose").text(data.purpose)
        $("#residencyFormType").text(data.form_type)
        $("#residencyFormTypeValue").val(data.form_type)
        $("#residencyQty").text(data.qty)
        $("#residencyFeedback").val(data.feedback)
      }
    })
  })
})

$(document).ready(function () {
  $(".clearancebtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/clearance",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#clearanceId").val(data.id)
        $("#clearanceControl").val(data.control)
        $("#clearanceLastName").val(data.last_name)
        $("#clearanceFirstName").val(data.first_name)
        $("#clearanceMiddleName").val(data.middle_name)
        $("#clearanceSuffix").val(data.suffix)
        $("#clearanceContactNum").val(data.contact_number)
        $("#clearancePermitTo").val(data.permit_to)
        $("#clearancePurpose").val(data.purpose)
        $("#clearanceQty").val(data.qty)
        $("#clearanceFeedback").val(data.feedback)
      }
    })
  })
})

// view clearance only
$(document).ready(function () {
  $(".clearancebtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/clearance",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#clearanceId").val(data.id)
        $("#clearanceControl").text(data.control)
        $("#clearanceLastName").text(data.last_name)
        $("#clearanceFirstName").text(data.first_name)
        $("#clearanceMiddleName").text(data.middle_name)
        $("#clearanceSuffixView").text(data.suffix)
        $("#clearanceContactNum").text(data.contact_number)
        $("#clearanceFormType").text(data.form_type)
        $("#clearanceFormTypeValue").val(data.form_type)
        $("#clearancePermitToView").text(data.permit_to)
        $("#clearancePurposeView").text(data.purpose)
        $("#clearanceQty").text(data.qty)
        $("#clearanceFeedback").text(data.feedback)
      }
    })
  })
})

$(document).ready(function () {
  $(".clearanceIdbtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/clearance_id",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#clearanceIdId").val(data.id)
        $("#clearanceIdControl").val(data.control)
        //$('#formIdPic').val(data.id_pic);
        // attr("src", result.profile_image)
        $("#idPicDisplay").attr(
          "src",
          "http://localhost/brgywashington/img/id/" + data.id_pic
        )
        // $("#idPicDisplay").val(data.id_pic)
        // $("#formIdPic").val(data.id_pic)
        $("#clearanceIdLastName").val(data.last_name)
        $("#clearanceIdFirstName").val(data.first_name)
        $("#clearanceIdMiddleName").val(data.middle_name)
        $("#clearanceIdSuffix").val(data.suffix)
        $("#clearanceIdGender").val(data.gender)
        $("#clearanceIdBirthDate").val(data.birth_date)
        $("#clearanceIdBirthPlace").val(data.birth_place)
        $("#clearanceIdCivilStatus").val(data.civil_status)
        $("#clearanceIdAddress").val(data.address)
        $("#clearanceIdContactNum").val(data.contact_number)
        $("#clearanceIdPermitTo").val(data.permit_to)
        $("#clearanceIdPurpose").val(data.purpose)
        $("#clearanceIdQty").val(data.qty)
        $("#clearanceIdFeedback").val(data.feedback)
      }
    })
  })
})
// clearance id View only
$(document).ready(function () {
  $(".clearanceIdbtn").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_detail/" + id + "/req/clearance_id",
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#clearanceIdId").val(data.id)
        $("#clearanceIdControl").val(data.control)
        //$('#formIdPic').val(data.id_pic);
        // attr("src", result.profile_image)
        $("#idPicDisplay").attr(
          "src",
          "http://localhost/brgywashington/img/id/" + data.id_pic
        )
        // $("#idPicDisplay").val(data.id_pic)
        // $("#formIdPic").val(data.id_pic)
        $("#clearanceIdLastName").text(data.last_name)
        $("#clearanceIdFirstName").text(data.first_name)
        $("#clearanceIdMiddleName").text(data.middle_name)
        $("#clearanceIdSuffix").text(data.suffix)
        $("#clearanceIdGender").text(data.gender)
        $("#clearanceIdBirthDate").text(data.birth_date)
        $("#clearanceIdBirthPlace").text(data.birth_place)
        $("#clearanceIdCivilStatusView").text(data.civil_status)
        $("#clearanceIdAddress").text(data.address)
        $("#clearanceIdFormType").text(data.form_type)
        $("#clearanceIdFormTypeValue").val(data.form_type)
        $("#clearanceIdContactNum").text(data.contact_number)
        $("#clearanceIdPermitToView").text(data.permit_to)
        $("#clearanceIdPurposeView").text(data.purpose)
        $("#clearanceIdQty").text(data.qty)
        $("#clearanceIdFeedback").val(data.feedback)
      }
    })
  })
})

// toggle view password
// const togglePassword = document.querySelector("#togglePassword")

// const password = document.querySelector("#password")

// togglePassword.addEventListener("click", () => {
//   // Toggle the type attribute using
//   // getAttribure() method
//   const type =
//     password.getAttribute("type") === "password" ? "text" : "password"

//   password.setAttribute("type", type)

//   // Toggle the eye and bi-eye icon
//   this.classList.toggle("bi-eye")
// })

// const password = document.querySelector("#password")
// const toggleView = document.querySelector(".toggle-icon")
// console.log(toggleView)
// toggleView.addEventListener("click", () => {
//   console.log("change happen")
//   console.log(toggleView)
//   toggleView.style.display = "none"
//   console.log(toggleView)
// })
// $(".toggle-password").click(function () {
//   $(this).toggleClass("fa-eye fa-eye-slash")
//   var input = $($(this).attr("toggle"))
//   if (input.attr("type") == "password") {
//     input.attr("type", "text")
//   } else {
//     input.attr("type", "password")
//   }
// })

function validateForm() {
  event.preventDefault() // prevent form submit
  var form = event.target.form
  swal({
    title: "Are you sure?",
    text: "Once cancelled, your request will not be process anymore!",
    icon: "warning",
    buttons: ["Close", "Yes"],
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      form.submit()
    }
  })
}

// setTimeout(function () {
//   document.querySelector(".loader-bg")
// }, 1)

// RESIDENT SECTION
$(document).ready(function () {
  $(".viewResidentbtn").click(function () {
    console.log("clicked")
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_resident/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        // $("#indigencyId").val(data.id)
        $("#viewLastName").text(data.last_name)
        $("#viewFirstName").text(data.first_name)
        $("#viewMiddleName").text(data.middle_name)
        $("#viewSuffix").text(data.suffix)
        $("#viewGender").text(data.gender)
        $("#viewBirthDate").text(data.birth_date)
        $("#viewBirthPlace").text(data.birth_place)
        // $("#viewAge").text(data.age)
        $("#viewCivilStatus").text(data.civil_status)
        $("#viewNationality").text(data.nationality)
        $("#viewReligion").text(data.religion)
        $("#viewOccupation").text(data.occupation)
        $("#viewContactNum").text(data.contact_number)
        $("#viewPwd").text(data.pwd)
        $("#viewPwdId").text(data.pwd_id)
        $("#viewFamilyMonthlyIncome").text(data.family_monthly_income)
        $("#viewIndigent").text(data.indigent)
        $("#viewSoloParent").text(data.solo_parent)
        $("#viewSoloParentId").text(data.solo_parent_id)
        $("#viewpantawidPamilya").text(data.pantawid_pamilya)
        $("#viewVoter").text(data.voter)
        $("#viewPurok").text(data.purok)
        $("#viewHouseNo").text(data.house_no)
        $("#viewStreet").text(data.street)
        $("#viewToContactFullName").text(data.to_contact_fullname)
        $("#viewToContactRelationship").text(data.to_contact_relationship)
        $("#viewToContactNumber").text(data.to_contact_number)
        $("#viewToContactAddress").text(data.to_contact_address)
        $("#viewNationalIdNo").text(data.national_id_no)
        $("#viewPhilhealthNo").text(data.philhealthNo)
        $("#viewSssNo").text(data.sss_no)
        $("#viewPagibigNo").text(data.pagibig_no)
        $("#viewTinNo").text(data.tin_no)
        $("#viewVotersIdNo").text(data.voter_id_no)
        $("#viewCovidStatus").text(data.covid_status)
        $("#viewVaccinated").text(data.vaccinated)
        $("#viewDateOfRegistration").text(data.date_registered)
        $("#viewDateOfDeath").text(data.date_death)
        $("#viewAliveDeseased").text(data.status)
        $("#viewAddedBy").text("Added by " + data.added_by)
        $("#viewUpdatedBy").text("Last update by " + data.updated_by)

        if (data.profile_pic.length > 11) {
          $("#viewDisplayResident").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/" + data.profile_pic
          )
        } else {
          $("#viewDisplayResident").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/placeholder.png"
          )
        }
        $("#viewBirthDate").val(data.birth_date)

        today = new Date()
        birthDate = new Date($("#viewBirthDate").val())
        age = today.getFullYear() - birthDate.getFullYear()
        m = today.getMonth() - birthDate.getMonth()
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--
        }
        $("#viewAge").text(age)

        // $("#formIdPic").val(data.profile_pic)
      }
    })
  })
})

$(document).ready(function () {
  $(".editResidentbtn").click(function () {
    console.log("clicked")
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_resident/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        // $("#indigencyId").val(data.id)
        $("#editId").val(data.id)
        $("#editLastName").val(data.last_name)
        $("#editFirstName").val(data.first_name)
        $("#editMiddleName").val(data.middle_name)
        $("#editSuffix").val(data.suffix)
        $("#editGender").val(data.gender)
        $("#editBirthDate").val(data.birth_date)
        $("#editBirthPlace").val(data.birth_place)
        // $("#editAge").val(data.age)
        $("#editCivilStatus").val(data.civil_status)
        $("#editNationality").val(data.nationality)
        $("#editReligion").val(data.religion)
        $("#editOccupation").val(data.occupation)
        $("#editContactNum").val(data.contact_number)
        $("#editPwd").val(data.pwd)
        $("#editPwdId").val(data.pwd_id)
        $("#editFamilyMonthlyIncome").val(data.family_monthly_income)
        $("#editIndigent").val(data.indigent)
        $("#editSoloParent").val(data.solo_parent)
        $("#editSoloParentId").val(data.solo_parent_id)
        $("#editpantawidPamilya").val(data.pantawid_pamilya)
        $("#editVoter").val(data.voter)
        $("#editPurok").val(data.purok)
        $("#editHouseNo").val(data.house_no)
        $("#editStreet").val(data.street)
        $("#editToContactFullName").val(data.to_contact_fullname)
        $("#editToContactRelationship").val(data.to_contact_relationship)
        $("#editToContactNumber").val(data.to_contact_number)
        $("#editToContactAddress").val(data.to_contact_address)
        $("#editNationalIdNo").val(data.national_id_no)
        $("#editPhilhealthNo").val(data.philhealthNo)
        $("#editSssNo").val(data.sss_no)
        $("#editPagibigNo").val(data.pagibig_no)
        $("#editTinNo").val(data.tin_no)
        $("#editVotersIdNo").val(data.voter_id_no)
        $("#editCovidStatus").val(data.covid_status)
        $("#editVaccinated").val(data.vaccinated)
        $("#editDateOfRegistration").val(data.date_registered)
        $("#editDateOfDeath").val(data.date_death)
        $("#editAliveDeseased").val(data.status)
        if (data.status == "Alive") {
          $("#editAlive").prop("checked", true)
        } else {
          $("#editDeseased").prop("checked", true)
        }
        if (data.profile_pic.length > 11) {
          $("#editDisplayResident").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/" + data.profile_pic
          )
        } else {
          $("#editDisplayResident").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/placeholder.png"
          )
        }

        today = new Date()
        birthDate = new Date($("#editBirthDate").val())
        age = today.getFullYear() - birthDate.getFullYear()
        m = today.getMonth() - birthDate.getMonth()
        if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
          age--
        }
        $("#editAge").val(age)

        // $("#formIdPic").val(data.profile_pic)
      }
    })
  })
})

function residentDelete() {
  event.preventDefault() // prevent form submit
  const formRes = event.target.form
  swal({
    title: "Are you sure?",
    text: "Once deleted, it will be completely remove!",
    icon: "warning",
    buttons: ["Close", "Yes"],
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      formRes.submit()
    }
  })
}

function postDelete() {
  event.preventDefault() // prevent form submit
  const formRes = event.target.form
  swal({
    title: "Are you sure?",
    text: "Once deleted, it will be completely remove!",
    icon: "warning",
    buttons: ["Close", "Yes"],
    dangerMode: true
  }).then(willDelete => {
    if (willDelete) {
      formRes.submit()
    }
  })
}

$(document).ready(function () {
  $(".officialBtn").click(function () {
    console.log("modal open")
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_official/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#id").val(data.id)
        $("#fullname").val(data.fullname)
        $("#committee").val(data.committee)
        $("#position").val(data.position)
        $("#contactNumber").val(data.contact_number)
      }
    })
  })
})

$(document).ready(function () {
  $(".editProfile").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_profile/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#profileId").val(data.id)
        $("#profileFirstName").val(data.first_name)
        $("#profileLastName").val(data.last_name)
        $("#profileUsername").val(data.username)
        $("#profileEmail").val(data.email)
        $("#profilePurok").val(data.purok_number)
        if (data.profile_pic.length > 0) {
          $("#profileDisplay").attr(
            "src",
            "http://localhost/brgywashington/img/" + data.profile_pic
          )
        } else {
          $("#profileDisplay").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/placeholder.png"
          )
        }
      }
    })
  })
})

$(document).ready(function () {
  $(".verifyRequest").click(function () {
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_profile/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#profileId").val(data.id)
      }
    })
  })
})

$(document).ready(function () {
  $(".viewAccount").click(function () {
    console.log("Clicked")
    const id = $(this).attr("data-id")
    $.ajax({
      url: "view_account/" + id,
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#accountId").val(data.id)
        $("#accountType").val(data.account_type)
        $("#firstName").text(data.first_name)
        $("#middleName").text(data.middle_name)
        $("#lastName").text(data.last_name)
        $("#suffix").text(data.suffix)
        $("#profileUsername").val(data.username)
        $("#profileNumber").val(data.mobile_number)
        $("#profileAddress").val(data.address)
        $("#profileGender").val(data.gender)
        $("#profilePurok").val(data.purok_number)
        $("#username").val(data.username)
        if (data.sup_document.length > 3) {
          $("#docStatus").attr(
            "src",
            "http://localhost/brgywashington/img/" + data.sup_document
          )
        } else {
          $("#docStatus").attr(
            "src",
            "http://localhost/brgywashington/img/placeholder-id.png"
          )
        }

        if (data.profile_pic.length > 0) {
          $("#profilePicAccount").attr(
            "src",
            "http://localhost/brgywashington/img/" + data.profile_pic
          )
        } else {
          $("#profilePicAccount").attr(
            "src",
            "http://localhost/brgywashington/img/id/resident/placeholder.png"
          )
        }
      }
    })
  })
})

$(document).ready(function () {
  console.log("Run.....")
  $(".searchName").keypress(function () {
    console.log("keystrokkk...")
    $.ajax({
      type: "POST",
      url: "loadResident/",
      data: {
        last_name: $("#searchL").val(),
        first_name: $("#searchF").val(),
        middle_name: $("#searchM").val(),
        suffix: $("#searchS").val()
      },
      dataType: "JSON",
      success: function (data) {
        console.log(data)
        $("#inputFirstNameIndigency").val(data.first_name)
        $("#inputMiddleNameIndigency").val(data.middle_name)
        $("#inputLastNameIndigency").val(data.last_name)
        $("#inputSuffixIndigency").val(data.suffix)
        $("#inputContactNumIndigency").val(data.contact_number)

        $("#inputFirstNamePermit").val(data.first_name)
        $("#inputMiddleNamePermit").val(data.middle_name)
        $("#inputLastNamePermit").val(data.last_name)
        $("#inputSuffixPermit").val(data.suffix)
        $("#inputContactNumPermit").val(data.contact_number)

        $("#inputFirstNameClearance").val(data.first_name)
        $("#inputMiddleNameClearance").val(data.middle_name)
        $("#inputLastNameClearance").val(data.last_name)
        $("#inputSuffixClearance").val(data.suffix)
        $("#inputContactNumClearance").val(data.contact_number)

        $("#inputFirstNameClearanceId").val(data.first_name)
        $("#inputMiddleNameClearanceId").val(data.middle_name)
        $("#inputLastNameClearanceId").val(data.last_name)
        $("#inputSuffixClearanceId").val(data.suffix)
        $("#inputContactNumClearanceId").val(data.contact_number)
        $("#inputGenderClearanceId").val(data.gender)
        $("#inputCivilStatusClearanceId").val(data.civil_status)
        $("#inputBirthPlaceClearanceId").val(data.birth_place)
        $("#inputBirthDateClearanceId").val(data.birth_date)

        if (data.profile_pic) {
          if (data.profile_pic.length > 11) {
            $(".walkInId").attr(
              "src",
              "http://localhost/brgywashington/img/id/resident/" + data.profile_pic
            )
            $("#idPicNone").val("resident/" + data.profile_pic)
          } else {
            $(".walkInId").attr(
              "src",
              "http://localhost/brgywashington/img/id/resident/placeholder.png"
            )
          }
        }

        $("#inputFirstNameResidency").val(data.first_name)
        $("#inputMiddleNameResidency").val(data.middle_name)
        $("#inputLastNameResidency").val(data.last_name)
        $("#inputSuffixResidency").val(data.suffix)
        $("#inputContactNumResidency").val(data.contact_number)
        $("#inputGenderResidency").val(data.gender)
        $("#inputBirthPlaceResidency").val(data.birth_place)
        $("#inputBirthDateResidency").val(data.birth_date)

        if (data != false) {
          $("#namePreview").text(
            data.last_name +
              " " +
              data.first_name +
              " " +
              data.middle_name +
              " " +
              data.suffix
          )
          $("#namePreview").removeClass("text-danger")
          $("#namePreview").addClass("text-success")
          $("#load")
            .on("change", function () {
              $("#send").prop("disabled", !$(this).val())
            })
            .trigger("change")
        } else {
          $("#namePreview").text("no data found")
          $("#namePreview").removeClass("text-success")
          $("#namePreview").addClass("text-danger")
          $("#load")
            .on("change", function () {
              $("#send").prop("disabled", $(this).val())
            })
            .trigger("change")
        }
      }
    })
  })
})

$("#inputBirthDate").on("change", function () {
  today = new Date()
  birthDate = new Date($("#inputBirthDate").val())
  age = today.getFullYear() - birthDate.getFullYear()
  m = today.getMonth() - birthDate.getMonth()
  if (birthDate >= today) {
    alert("Invalid Birthdate")
  } else {
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--
    }
    $("#inputAge").val(age)
  }
})

$("#editBirthDate").on("change", function () {
  today = new Date()
  birthDate = new Date($("#editBirthDate").val())
  age = today.getFullYear() - birthDate.getFullYear()
  m = today.getMonth() - birthDate.getMonth()
  if (birthDate >= today) {
    alert("Invalid Birthdate")
  } else {
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--
    }
    $("#editAge").val(age)
  }
})

$("#editOpen").on("click", function () {
  today = new Date()
  birthDate = new Date($("#editBirthDate").val())
  age = today.getFullYear() - birthDate.getFullYear()
  m = today.getMonth() - birthDate.getMonth()
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--
  }
  $("#editAge").val(age)
})

$(".check_resident").keyup(function (e) {
  var checkFirstName = $(".check_first_name").val()
  var checkMiddleName = $(".check_middle_name").val()
  var checkLastName = $(".check_last_name").val()
  var checkSuffix = $(".check_suffix").val()

  $.ajax({
    type: "POST",
    url: "check_resident/",
    data: {
      check_submit_btn: 1,
      checkFirstName: checkFirstName,
      checkMiddleName: checkMiddleName,
      checkLastName: checkLastName,
      checkSuffix: checkSuffix
    },
    success: function (data) {
      console.log(data)
      if (data != "It's good!") {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-success")
        $(".error_resident").addClass("text-danger")
        $(".add_success").prop("disabled", true)
      } else {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-danger")
        $(".error_resident").addClass("text-success")
        $(".add_success").removeAttr("disabled")
      }
    }
  })
})

$(".check_edit_resident").keyup(function (e) {
  var checkFirstName = $(".check_edit_first_name").val()
  var checkMiddleName = $(".check_edit_middle_name").val()
  var checkLastName = $(".check_edit_last_name").val()
  var checkSuffix = $(".check_edit_suffix").val()
  var checkId = $("#editId").val()
  $.ajax({
    type: "POST",
    url: "check_edit_resident/",
    data: {
      check_submit_btn: 1,
      checkId: checkId,
      checkFirstName: checkFirstName,
      checkMiddleName: checkMiddleName,
      checkLastName: checkLastName,
      checkSuffix: checkSuffix
    },
    success: function (data) {
      console.log(data)
      if (data == "It's good!") {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-danger")
        $(".error_resident").addClass("text-success")
        $(".edit_success").removeAttr("disabled")
      } else if (data == "Resident was already registered!") {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-success")
        $(".error_resident").addClass("text-danger")
        $(".edit_success").prop("disabled", true)
      } else {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-danger")
        $(".error_resident").addClass("text-success")
        $(".edit_success").removeAttr("disabled")
      }
    }
  })
})

$(".check_edit_resident").change(function (e) {
  var checkFirstName = $(".check_edit_first_name").val()
  var checkMiddleName = $(".check_edit_middle_name").val()
  var checkLastName = $(".check_edit_last_name").val()
  var checkSuffix = $(".check_edit_suffix").val()
  var checkId = $("#editId").val()
  $.ajax({
    type: "POST",
    url: "check_edit_resident/",
    data: {
      check_submit_btn: 1,
      checkId: checkId,
      checkFirstName: checkFirstName,
      checkMiddleName: checkMiddleName,
      checkLastName: checkLastName,
      checkSuffix: checkSuffix
    },
    success: function (data) {
      console.log(data)
      if (data == "It's good!") {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-danger")
        $(".error_resident").addClass("text-success")
        $(".edit_success").removeAttr("disabled")
      } else if (data == "Resident was already registered!") {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-success")
        $(".error_resident").addClass("text-danger")
        $(".edit_success").prop("disabled", true)
      } else {
        $(".error_resident").text(data)
        $(".error_resident").removeClass("text-danger")
        $(".error_resident").addClass("text-success")
        $(".edit_success").removeAttr("disabled")
      }
    }
  })
})


//POSTS

/**document.addEventListener('DOMContentLoaded', function() {
  // Select all edit buttons
  document.querySelectorAll('.editPostbtn').forEach(button => {
      button.addEventListener('click', function() {
          // Retrieve data attributes from the clicked button
          const postId = this.getAttribute('data-id');
          const postTitle = this.getAttribute('data-title');
          const postBody = this.getAttribute('data-body');
          
          // Debugging: Log data to ensure it's retrieved
          console.log("Post ID:", postId);
          console.log("Post Title:", postTitle);
          console.log("Post Body:", postBody);

          // Set modal input fields with retrieved data
          document.getElementById('inputId').value = postId;
          document.getElementById('inputTitle').value = postTitle;
          document.getElementById('inputBody').value = postBody;
      });
  });
});**/

$(document).ready(function () {
  // Handle click event on edit button for posts
  $(".editPostbtn").click(function () {
    console.log("modal open");

    // Get post ID from data attribute
    const id = $(this).attr("data-id");

    // Send AJAX request to fetch post data
    $.ajax({
      url: "view_post/" + id, // URL for fetching post data
      type: "GET",
      data: {
        id: id
      },
      dataType: "JSON",

      success: function (data) {
        console.log(data);

        // Populate modal fields with the data from the server
        $("#id").val(data.id);
        $("#title").val(data.title);
        $("#body").val(data.body);
      },
      error: function (error) {
        console.error("Failed to retrieve post data:", error);
        alert("Error loading post data. Please try again.");
      }
    });
  });
});




function confirmSendMessage(postId) {
  Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to send this message?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, send it!'
  }).then((result) => {
      if (result.isConfirmed) {
          // Submit the form if confirmed
          document.getElementById(`messageForm_${postId}`).submit();
      }
  });
}
