<<template>
    <div>
        <h1>Translation Management</h1>
        <table>
            <tr v-for="translation in translations" :key="translation.id">
                <td>{{ translation.locale }}</td>
                <td>{{ translation.key }}</td>
                <td>{{ translation.content }}</td>
            </tr>
        </table>
    </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';

const props = defineProps({ translations: Array, pagination: Object });

const prevPage = () => {
    if (props.pagination.current_page > 1) {
        window.location.href = `/translations/ui?page=${props.pagination.current_page - 1}`;
    }
};

const nextPage = () => {
    if (props.pagination.current_page < props.pagination.last_page) {
        window.location.href = `/translations/ui?page=${props.pagination.current_page + 1}`;
    }
};
</script>

<style scoped>

</style>
