const ExamRegistration = {
    
    data(){
        return {
            app_loading:false,
            my_class:null,
            my_section:null,
            classes:[{name:'Loading Classes...'}],
            active_exam:[],
            subjects:[],
            sections: [],
            students: [],
            showStudents: false,
            showExamRegistrationModal: false,
            
            selected_student:null,
            registered_subjects:[],
            registered_subjects_id:[],
            selected_subjects:[],
            subject_registration_message:''
            
            
        }
    },
    methods:{
        
        async getRequests(url,query = ''){
            try {
                return response = await axios.get(url+query);
                
              } catch (error) {
                console.error(error);
              }
        },
        async postRequests(url,params = {}){
            try {
                return response = await axios.post(url,params);
                
              } catch (error) {
                console.error(error);
              }
        },

        //initialize class dropdown on load
        async initClasses(){
            response = await this.getRequests('/api/classes');
            this.classes = response.data;
        },
        //initialize subjects on load
        async initSubjects(){
            response = await this.getRequests('api/exam-registration/subjects');
            this.subjects = response.data;
        },
        //initialize active exam on load
        async initActiveExam(){
            response = await this.getRequests('api/exam-registration/active-exam');
            this.active_exam = response.data;
        },
        //load sections
        async loadClassSections(class_id){
            url = '/api/sections/classes/'+class_id;
            console.log(url);
            response = await this.getRequests(url);
            this.sections = response.data;
        },

        async loadStudents(){
            url = '/api/students/section/'+this.my_section;
            console.log(url);
            response = await this.getRequests(url);
            this.showStudents = true;
            this.students = response.data;
            
            
        },

        async initRegistrationModal(student_id){
            
            registered_subjects_url = `/api/exam-registration/student/${student_id}/section/
                                        ${this.my_section}/registered
                                      `;
            reg_subject_response = await this.getRequests(registered_subjects_url);
            //retrieve registered subjects                 
            this.registered_subjects = reg_subject_response.data ;
            //flatten the response to an array of subject id
            this.registered_subjects_id = [];
            this.registered_subjects.forEach(value=>this.registered_subjects_id.push(value.subject_id));
            console.log(this.registered_subjects_id);
            selected_student_url = `api/students/${student_id}`  ;              
            selected_student_response = await this.getRequests(selected_student_url);
                                              
            this.selected_student = selected_student_response.data;
            this.subject_registration_message = '';
            
            this.$nextTick( ()=>$('#exam-registration-modal').modal('show'));
            
        },

        async registerSubject(subject_id){
            
            let payload = {'subject_id':subject_id,'student_id':this.selected_student.id,'section_id':this.my_section};
            let response = await this.postRequests('/api/exam-registration',payload);
            if(response.data.message=='fail'){
                //reload modal to reset checks
                this.initRegistrationModal(this.selected_student.id);
            }
            else{
                    this.subject_registration_message = response.data.action;
            }
        }

        



    },

    watch:{
        my_class(class_id){
            console.log(class_id);
            this.sections = [{name:'Loading...'}];
            this.loadClassSections(class_id);
        }
    },
    created(){
        this.initClasses();
        this.initSubjects();
        this.initActiveExam();

        axios.interceptors.request.use((config) => {
            // trigger 'loading=true' event here
            this.app_loading = true;
            return config;
          }, (error) => {
            // trigger 'loading=false' event here
            this.app_loading = false;
            return Promise.reject(error);
          });
        
          axios.interceptors.response.use((response) => {
            // trigger 'loading=false' event here
            this.app_loading= false;
            return response;
          }, (error) => {
            // trigger 'loading=false' event here
            this.app_loading = false;
            return Promise.reject(error);
          });
    },
}

const exam_reg_app = Vue.createApp(ExamRegistration);
/*components
app.component('posts', {
    props:['post'],
    template:`<h3>{{post.title}}</h3> 
              <p>{{post.content}}</p>`
});
*/


if(document.querySelector('#exam-reg')){
    exam_reg_app.mount('#exam-reg');
}


//Exam result entry Vue App

const ExamEntry = {
    
    data(){
        return {
            app_loading:false,
            my_class:null,
            my_section:null,
            my_subject:null,
            classes:[{name:'Loading Classes...'}],
            active_exam:[],
            subjects:[],
            sections: [],
            entries: [],
            showEntriess: false,
            cass1:null,
            cass2:null,
            tass:null,
            selected_subjects:[]
           
            
            
        }
    },
    methods:{
        
        async getRequests(url,query = ''){
            try {
                return response = await axios.get(url+query);
                
              } catch (error) {
                console.error(error);
              }
        },
        async postRequests(url,params = {}){
            try {
                return response = await axios.post(url,params);
                
              } catch (error) {
                console.error(error);
              }
        },

        //initialize class dropdown on load
        async initClasses(){
            response = await this.getRequests('/api/classes');
            this.classes = response.data;
        },
        //initialize subjects on load
        async initSubjects(){
            response = await this.getRequests('api/exam-entry/subjects');
            this.subjects = response.data;
        },
        //initialize active exam on load
        async initActiveExam(){
            response = await this.getRequests('api/exam-registration/active-exam');
            this.active_exam = response.data;
        },
        //load sections
        async loadClassSections(class_id){
            url = '/api/sections/classes/'+class_id;
            
            response = await this.getRequests(url);
            this.sections = response.data;
        },

        async loadStudentEntries(){
            url = `/api/exam-entry/section/${this.my_section}/subject/${this.my_subject}`;
            
            response = await this.getRequests(url);
            console.log(response.data);
            this.entries = response.data;
            this.showEntries = true;
           
            
            
        },

        

        async uploadEntry(subject_id){
            
            let payload = {'subject_id':subject_id,'student_id':this.selected_student.id,'section_id':this.my_section};
            let response = await this.postRequests('/api/exam-registration',payload);
            if(response.data.message=='fail'){
                //reload modal to reset checks
                this.initRegistrationModal(this.selected_student.id);
            }
            else{
                    this.subject_registration_message = response.data.action;
            }
        }

        



    },

    watch:{
        my_class(class_id){
            console.log(class_id);
            this.sections = [{name:'Loading...'}];
            this.loadClassSections(class_id);
        }
    },
    created(){
        this.initClasses();
        this.initSubjects();
        this.initActiveExam();

        axios.interceptors.request.use((config) => {
            // trigger 'loading=true' event here
            this.app_loading = true;
            return config;
          }, (error) => {
            // trigger 'loading=false' event here
            this.app_loading = false;
            return Promise.reject(error);
          });
        
          axios.interceptors.response.use((response) => {
            // trigger 'loading=false' event here
            this.app_loading= false;
            return response;
          }, (error) => {
            // trigger 'loading=false' event here
            this.app_loading = false;
            return Promise.reject(error);
          });
    },
}

const exam_entry_app = Vue.createApp(ExamEntry);
/*components
app.component('posts', {
    props:['post'],
    template:`<h3>{{post.title}}</h3> 
              <p>{{post.content}}</p>`
});
*/

if(document.querySelector('#exam-entry')){
    exam_entry_app.mount('#exam-entry');
}
