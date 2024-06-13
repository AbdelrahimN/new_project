var supervisors = [
  { name: "ahmed mohamed " },
  { name: "ahmed mohamed " },
  { name: "ahmed mohamed " },
];
const ideas = [
  { title: "Idea A", description: "Description of Idea A" },
  { title: "Idea B", description: "Description of Idea B" },
  { title: "Idea C", description: "Description of Idea C" }
];
// Get select element
var selectElement = document.getElementById("supervisorSelect");

function displaySupervisors() {
  //  dropdown with supervisors
  supervisors.forEach(function (supervisor) {
    var option = document.createElement("option");
    option.text = supervisor.name;
    option.value = supervisor.name;
    selectElement.appendChild(option);
  });
}
displaySupervisors();
var selectElement2 = document.getElementById("supervisorSelect2");
//ta start
// قم بإنشاء مجموعة من كائنات التعليم المساعدين
var teachingAssistants = [
  { name: "John Doe" },
  { name: "Jane Smith" },
  { name: "Mohamed Ali" },
  { name: "Sara Lee" }
];

// احصل على العنصر الخاص بـ TA select
var taSelectElement = document.getElementById("taSelect");

// وظيفة لعرض التعليم المساعدين في قائمة الاختيار
function displayTeachingAssistants() {
  // قم بإزالة جميع الخيارات الحالية باستثناء الخيار الافتراضي
  taSelectElement.innerHTML = '<option value="">Select teaching assistant</option>';
  
  // إضافة الخيارات إلى قائمة الاختيار
  teachingAssistants.forEach(function(ta) {
      var option = document.createElement("option");
      option.text = ta.name;
      option.value = ta.name;
      taSelectElement.appendChild(option);
  });
}

// قم باستدعاء الوظيفة لعرض التعليم المساعدين
displayTeachingAssistants();

// أضف مستمعًا لحدث 'change' لقائمة الاختيار الخاصة بـ TA
taSelectElement.addEventListener('change', function() {
  // احصل على القيمة التي تم تحديدها
  var selectedValue = taSelectElement.value;
  
  // اعرض القيمة التي تم تحديدها في وحدة التحكم
  console.log("Selected Teaching Assistant: " + selectedValue);
  
  // يمكنك إضافة كود هنا لتنفيذ إجراء معين بناءً على القيمة المحددة
  if (selectedValue) {
      alert("You have selected the Teaching Assistant: " + selectedValue);
  }
});

//ta end
function displaySupervisors2() {
  //  dropdown with supervisors
  supervisors.forEach(function (supervisor) {
    var option = document.createElement("option");
    option.text = supervisor.name;
    option.value = supervisor.name;
    selectElement2.appendChild(option);
  });
}
displaySupervisors2();

const ideasTableBody = document.getElementById('ideas-table-body');

ideas.forEach((idea, index) => {
  const row = document.createElement('tr');
  row.innerHTML = `
    <td>${idea.title}</td>
    <td>${idea.description}</td>
    <td><input type="radio" name="selectedIdea" value="${index}" onclick="selectIdea(${index})"></td>
  `;
  ideasTableBody.appendChild(row);
});

function selectIdea(index) {
  alert(`You selected: ${ideas[index].title}`);
  // You can perform any action here when an idea is selected
}

// Add click event listener to button

document
  .getElementById("logSelectedButton")
  .addEventListener("click", function () {
    // Get the selected value
    var selectedValue = selectElement.value;
    // Log the selected value
    console.log("Selected Supervisor: " + selectedValue);
  });


  // Function to handle form submission
  document.getElementById('suggestForm').addEventListener('submit', function(event) {
    event.preventDefault();
    let title = document.getElementById('titleInput').value;
    let desc = document.getElementById('descriptionInput').value;
    alert(title+"---------"+desc)

  });
