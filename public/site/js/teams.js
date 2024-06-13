var teams = [
  {
    teamName: "team1",
    members: ["Member 1", "Member 2", "Member 3", "Member 4", "Member 5"],
  },
  {
    teamName: "team2",
    members: ["Member 4", "Member 5"],
  },
  {
    teamName: "team3",
    members: ["Member 6", "Member 7", "Member 8"],
  },
  {
    teamName: "team3",
    members: ["Member 6", "Member 7", "Member 8"],
  },
];

function displayTeams(TeamsToShow) {
  var TeamCardsContainer = document.getElementById("teamsCards");
  TeamCardsContainer.innerHTML = "";
  if (TeamsToShow.length === 0) {
    document.getElementById("noTeamsMessage").classList.remove("d-none");
  } else {
    document.getElementById("noTeamsMessage").classList.add("d-none");
    TeamsToShow.forEach(function (team) {
      var card = document.createElement("div");
      card.classList.add("col-md-3", "col-6");

 
      var cardContent = `
        <div class="card my-2">
            <div class="card-body">
            <div class="h-75">
            <div><h5 class="card-title text-center proj-name">${
              team.teamName
            }</h5></div>
                
                <h6 class="card-subtitle mb-2 ">Team Members:</h6>
                <ul class="card-text list-unstyled">
                    ${team.members
                      .map(
                        (member) =>
                          `<li class="py-1"> <i class="fa-solid fa-user text-primary"></i> ${member}</li>`
                      )
                      .join("")}
                </ul>
                </div>
                <div class="  m-auto text-center ">
                <button class="btn btn-color  btn-sm my-2" onclick="joinTeam()">Join Team</button>
            </div>
            </div>
        </div>
    `;

      card.innerHTML = cardContent;
      TeamCardsContainer.appendChild(card);
    });
  }
}
// Function to filter teams based on search input
document.getElementById("teamName").addEventListener("input", function () {
  var searchInput = this.value.trim().toLowerCase();
  var filteredTeams = teams.filter(function (team) {
    return team.teamName.toLowerCase().includes(searchInput);
  });
  displayTeams(filteredTeams);
});
function joinTeam() {
  alert("You have joined the team!");
}
function ExitTeam() {
  alert("You have Exit the team!");
}
// Display teams when the page loads
displayTeams(teams);
// *********************************************************
// create new team
// Function to show the form when the button is clicked
document.getElementById("showFormBtn").addEventListener("click", function () {
  document.getElementById("teamForm").classList.toggle("hidden");
});

// Function to handle form submission
document
  .getElementById("teamCreationForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    // Get the team name from the form
    let teamName = document.getElementById("team-Name").value;
    let userName = "Ahmed Salah";

    // Create a new team object with the team name and an empty members array
    let newTeam = {
      teamName: teamName,
      members: [userName],
    };

    // Push the new team object to the teams array
    teams.push(newTeam);

    displayTeams(teams);

    //  You can do something with the teams array here, like sending it to a server

    // Clear the form
    document.getElementById("team-Name").value = "";

    // Hide the form again
    document.getElementById("teamForm").classList.add("hidden");
  });
