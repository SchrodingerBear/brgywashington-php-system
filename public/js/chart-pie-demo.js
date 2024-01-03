// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
Chart.defaults.global.defaultFontColor = "#292b2c"

var totalSingleMother = document.querySelector("#totalSingleMother").value
var totalVaccinated = document.querySelector("#totalVaccinated").value
var totalVoters = document.querySelector("#totalVoters").value
var totalSeniorCitizen = document.querySelector("#totalSeniorCitizen").value

// Pie Chart Example
var ctx = document.getElementById("myPieChart")
var myPieChart = new Chart(ctx, {
  type: "pie",
  data: {
    labels: ["Vaccinated", "Single Mother", "Voters", "Senior Citizen"],
    datasets: [
      {
        data: [
          totalVaccinated,
          totalSingleMother,
          totalVoters,
          totalSeniorCitizen
        ],
        backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745"]
      }
    ]
  }
})
