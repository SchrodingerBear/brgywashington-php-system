// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'
Chart.defaults.global.defaultFontColor = "#292b2c"

var totalResidents = document.querySelector("#totalResidents").value
var totalSingleMother = document.querySelector("#totalSingleMother").value
var totalVaccinated = document.querySelector("#totalVaccinated").value
var totalVoters = document.querySelector("#totalVoters").value
var totalSeniorCitizen = document.querySelector("#totalSeniorCitizen").value

// Bar Chart Example
var ctx = document.getElementById("myBarChart")
var myLineChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: [
      "Total residents",
      "Vaccinated",
      "Single Mother",
      "Voters",
      "Senior Citizen"
    ],
    datasets: [
      {
        data: [
          totalResidents,
          totalVaccinated,
          totalSingleMother,
          totalVoters,
          totalSeniorCitizen
        ],
        backgroundColor: ["#f03073", "#007bff", "#30f0d6", "#e630f0", "#28a745"]
      }
    ]
  },
  options: {
    scales: {
      xAxes: [
        {
          // time: {
          //   unit: "month"
          // },
          gridLines: {
            display: false
          }
          // ticks: {
          //   maxTicksLimit: 6
          // }
        }
      ],
      yAxes: [
        {
          ticks: {
            // min: 0,
            // max: 15000,
            maxTicksLimit: 5
          },
          gridLines: {
            display: true
          }
        }
      ]
    },
    legend: {
      display: false
    }
  }
})

// Pie Chart Example
// var ctx = document.getElementById("myPieChart")
// var myPieChart = new Chart(ctx, {
//   type: "pie",
//   data: {
//     labels: ["Vaccinated", "Single Mother", "Voters", "Senior Citizen"],
//     datasets: [
//       {
//         data: [
//           totalVaccinated,
//           totalSingleMother,
//           totalVoters,
//           totalSeniorCitizen
//         ],
//         backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745"]
//       }
//     ]
//   }
// })
