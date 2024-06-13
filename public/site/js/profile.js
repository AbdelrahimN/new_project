document.addEventListener("DOMContentLoaded", function (event) {
    let skills = true;
    if (skills) {
      showTab(currentTab);
    } else {
      window.location.href = "home.html";
    }
  });
  
const data = {
    name: "Ahmed Ali Ahmed ",
    id: 2000458,
    email: "john@example.com",
    center: "Asyut",
    gpa: 3.8,
    skills: ["Skill 1", "Skill 2", "Skill 3"] // Sample skills data
};

document.addEventListener("DOMContentLoaded", function() {
    // Populate form fields with data
    document.querySelector('.name').value = data.name;
    document.querySelector('.id').value = data.id;
    document.querySelector('.email').value = data.email;
    document.querySelector('.center').value = data.center;
    document.querySelector('.gpa').value = data.gpa;
    document.querySelector('.form-control').value = data.skills.join('\n');
});