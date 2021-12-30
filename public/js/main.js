


async function bootstrapCbtApp(){
    const CbtModule = await import("./modules/cbt/cbt.js");
    Vue.createApp(CbtModule.CbtApp)
        .mount("#cbt-app");
}
async function bootstrapStudentCbtApp(){
    const StudentCbtModule = await import("./modules/student-cbt/index.js");
    Vue.createApp(StudentCbtModule.StudentCbtApp)
        .mount("#student-cbt-app");
}

if(document.querySelector("#cbt-app")){
    bootstrapCbtApp();
}

if(document.querySelector("#student-cbt-app")){
    bootstrapStudentCbtApp();
}

