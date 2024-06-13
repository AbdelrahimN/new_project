// تحديد النموذج وعناصر الإدخال
const form = document.getElementById('loginForm');
const emailInput = document.getElementById('emailInput');
const passwordInput = document.getElementById('passwordInput');
const radioInputs = document.querySelectorAll('input[name="role"]');

// وظيفة التحقق من الاختيار
function checkSelection(event) {
    // منع تقديم النموذج افتراضياً لمنع إعادة التحميل
    event.preventDefault();
    
    // التحقق مما إذا كان أحد الخيارات قد تم تحديده
    let isSelected = false;
    let selectedValue = null;

    radioInputs.forEach((input) => {
        if (input.checked) {
            isSelected = true;
            selectedValue = input.value;

        }
    });
    
    // إذا لم يتم تحديد أي خيار، عرض رسالة خطأ
    if (!isSelected) {
        alert('Please select one of the options: Student, T.A, Supervisor, Admin.');
    } else {
        // إذا تم تحديد خيار، احصل على قيم البريد الإلكتروني وكلمة المرور
        const email = emailInput.value;
        const password = passwordInput.value;
        
        // طباعة القيم في وحدة التحكم
        console.log('Email:', email);
        console.log('Password:', password);
        console.log('Selected Role:', selectedValue);
// check role
        if (selectedValue === "student") {
                window.location.href = 'profile.html'; // قم بتغيير الرابط إلى الصفحة المراد التوجيه إليها
            } else if(selectedValue === "ta"){
                // إذا كان الدور ليس مساويًا لـ "T.A"، يمكنك هنا تنفيذ الإجراءات الأخرى المطلوبة
                // مثلاً، قد ترغب في تقديم النموذج أو عرض رسالة تفيد بأن الدور غير مدعوم
                // form.submit();
            }else{

            }
        // يمكنك متابعة تقديم النموذج إذا كنت ترغب في ذلك
        // form.submit(); // إزالة التعليق إذا كنت ترغب في تقديم النموذج
    }
}

// إضافة مستمع الحدث إلى النموذج
form.addEventListener('submit', checkSelection);
