const  mydata=[{
    supervisor:"a",
    teachingassistant:"e",
    tA:"x",
    idea:{
        title:"a",
        desc:"z"
    },
    teamMembers:["a","b","c","d","e"]

}]

 document.getElementById('supervisor').textContent = mydata[0].supervisor;
 document.getElementById('teachingassistant').textContent = mydata[0].teachingassistant;
 document.getElementById('teamLeader').textContent = mydata[0].tA;
 document.getElementById('ideaTitle').textContent = mydata[0].idea.title;
 document.getElementById('ideaDesc').textContent = mydata[0].idea.desc;
 var teamMembersList = document.getElementById('teamMembers');
 mydata[0].teamMembers.forEach(function(member) {
   var li = document.createElement('li');
   li.className = 'list-group-item';
   li.textContent = member;
   teamMembersList.appendChild(li);
 });