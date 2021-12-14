<template>
    <div>
        <Link href="/about">About</Link>
        <h1>Happy coding</h1>
        <p v-for="todo in todos" :key="todo.id">
            {{todo.top_priority}}
            {{todo.id}}
            <button @click="deleteTodo(todo.id)">Delete</button>
        </p>
    </div>
</template>

<script lang="ts">
import { defineComponent,PropType, Ref, ref } from 'vue'
import { Todo } from '../../types/todo'
import { Link } from '@inertiajs/inertia-vue3'


interface Props {
    todolist: Todo[]
}

export default defineComponent({
    props: {
        todolist: {
            type: Array as PropType<Todo[]>,
            required: true
        }
    },
    components: {
        Link,
    },
    setup (props: Props) {
        
        const todos: Ref<Todo[]> = ref(props.todolist)

        const removeTodoFromArray = (todoId: number) => {
            const index = todos.value.findIndex((todo: Todo) => todo.id === todoId)
            todos.value.splice(index, 1)
        }

        const deleteTodoFromDatabase = (todoId: number) => {
            //axios.delete('/some-endpoint' + todoId)
        }

        const deleteTodo = (todoId: number) => {
           removeTodoFromArray(todoId)
            deleteTodoFromDatabase(todoId)
               
        }

        return {
            todos,
            deleteTodo
        }
    }
})
</script>

<style scoped>

</style>