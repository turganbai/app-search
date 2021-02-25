<template>
    <div>
        <el-container>
            <el-main>
                <el-form :inline="true" :model="formInline" class="demo-form-inline">
                    <el-form-item label="Name">
                        <el-input size="mini" v-model="formInline.name" placeholder="Name"></el-input>
                    </el-form-item>
                    <el-form-item label="Bedrooms">
                        <el-input-number size="mini" v-model="formInline.bedrooms"></el-input-number>
                    </el-form-item>
                    <el-form-item label="Bathrooms">
                        <el-input-number size="mini" v-model="formInline.bathrooms"></el-input-number>
                    </el-form-item>
                    <el-form-item label="Stories">
                        <el-input-number size="mini" v-model="formInline.stories"></el-input-number>
                    </el-form-item>
                    <el-form-item label="Garages">
                        <el-input-number size="mini" v-model="formInline.garages"></el-input-number>
                    </el-form-item>
                    <el-form-item label="Price">
                        <el-input size="mini" v-model="formInline.priceMin" placeholder="from"></el-input>
                    </el-form-item>
                    <el-form-item label="-">
                        <el-input size="mini" v-model="formInline.priceMax" placeholder="to"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button size="mini" type="primary" @click="onSubmit">Query</el-button>
                    </el-form-item>
                    <el-form-item>
                        <el-button size="mini" type="primary" @click="onReset">Reset</el-button>
                    </el-form-item>
                </el-form>
            </el-main>
        </el-container>


        <template>
            <el-table
                v-loading="loading"
                :data="tableData"
                style="width: 100%">
                <el-table-column
                    prop="name"
                    label="Name">
                </el-table-column>
                <el-table-column
                    prop="bedrooms"
                    label="Bedrooms"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="bathrooms"
                    label="Bathrooms"
                    width="180">
                </el-table-column>

                <el-table-column
                    prop="stories"
                    label="Stories"
                    width="180">
                </el-table-column>

                <el-table-column
                    prop="garages"
                    label="Garages"
                    width="180">
                </el-table-column>
                <el-table-column
                    prop="price"
                    label="Price"
                    width="180">
                </el-table-column>
            </el-table>
        </template>
    </div>
</template>

<script>
const searchUrl = 'http://127.0.0.1:8000/api/search';
export default {
    name: "hotels",
    data() {
        return {
            url: new URL(searchUrl),
            visible: false,
            formInline: {
                name: null,
                priceMin: null,
                priceMax: null,
                bedrooms: null,
                bathrooms: null,
                stories: null,
                garages: null
            },
            tableData: [],
            loading: false
        }
    },

    mounted() {
        this.fetchData();
    },

    methods: {
        onSubmit() {
            Object.keys(this.formInline).forEach(key => {
                if (!!this.formInline[key]) {
                    this.url.searchParams.append(key, this.formInline[key])
                }
            })
            this.fetchData()
        },


        fetchData() {
            this.loading = true;
            fetch(this.url)
                .then(response => response.json())
                .then(response => {
                    this.tableData = response
                    if (!!this.tableData.length) {
                        let massage = `Found ${this.tableData.length} records`;
                        this.startHacking('success', massage)
                    } else {
                        this.startHacking('error', 'Not found')
                    }
                })
                .finally(() => {
                    this.loading = false;
                    this.url = new URL(searchUrl)
                })
        },

        onReset() {
            this.formInline.name = null;
            this.formInline.priceMin = null;
            this.formInline.priceMax = null;
            this.formInline.bedrooms = null;
            this.formInline.bathrooms = null;
            this.formInline.bathrooms = null;
            this.formInline.garages = null;
            this.fetchData()
        },

        startHacking(type, massage) {
            this.$notify({
                title: 'Massage',
                type: type,
                message: massage,
                duration: 5000
            })
        },
    }
}
</script>

<style scoped>

</style>
