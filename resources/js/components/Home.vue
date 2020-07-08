<template>
    <div>
        <h2>
            Home page
        </h2>
        <form action="" @submit.prevent="createTeacher">
            <input type="text" v-model="teacher.name">
            <input type="text" v-model.number="teacher.age">
            <button type="submit" class="btn btn-primary">create</button>
        </form>

        <h2>Teacher Table</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="teacher in teachers" :key="teacher.id" :class="[{'bg-warning': teacher.id % 2  === 0, 'bg-success': teacher.id % 3 === 0}]">
                <th scope="row">{{teacher.id}}</th>
                <td>{{teacher.name}}</td>
                <td>{{teacher.age}}</td>
            </tr>
            </tbody>
        </table>

        <h2>Student Table</h2>

        <form action="" @submit.prevent="createStudents">
            <input type="text" v-model="student.name">
            <select name="" id="" v-model="student.teacher_id">
                <option :value="teacherId.id" v-for="teacherId in teachers">{{teacherId.id}}</option>
            </select>
            <button class="btn btn-primary" type="submit">create</button>
        </form>


        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Name</th>
                <th scope="col">Teacher_Id</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="student in students" :key="student.id" :class="[{'bg-warning': student.id % 2  === 0, 'bg-danger': student.id % 3 === 0}]">
                <th scope="row">{{student.id}}</th>
                <td>{{student.name}}</td>
                <td>{{student.teacher_id}}</td>
            </tr>
            </tbody>
        </table>

    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        name: "Home",
        data() {
            return {
                teacher: {
                    name: '',
                    age: ''
                },
                teachers: [],
                student: {
                    name: '',
                    teacher_id: '2'
                },
                students: []
            }
        },
        methods: {
            createTeacher() {
                axios.post('/api/teacher', {
                    name: this.teacher.name,
                    age: this.teacher.age
                })
                    .then(res => {
                        this.getTeachers()
                        this.teacher.name = ''
                        this.teacher.age = ''
                    })
                    .catch(err => {

                    })
            },
            createStudents() {
              axios.post('/api/student', {
                  name: this.student.name,
                  teacher_id: this.student.teacher_id
              })
                .then(res => {
                    this.getStudents()
                    this.student.name = ''
                    this.student.teacher_id = ''
                })
                .catch(err => {

                })
            },
            getTeachers() {
                axios.get('/api/teacher')
                    .then(res => {
                        this.teachers = res.data
                    })
                    .catch(err => {
                        console.log(err, 'err');
                    })
            },
            getStudents() {
                axios.get('/api/student')
                    .then(res => {
                        this.students = res.data
                    })
                    .catch(err => {

                    })
            }
        },
        mounted() {
            this.getTeachers();
            this.getStudents();
        }
    }
</script>

<style scoped>

</style>
