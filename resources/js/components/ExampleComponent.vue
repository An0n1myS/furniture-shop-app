<template>
    <div class="m-10 w-5/6 m-auto">
        <h1 class="text-3xl m-8 text-center">Научу зарабатывать от 50 000р. в час</h1>
        <div class="w-full flex flex-row justify-around">
            <img src="../assets/images/коуч.jpg" width="500px">
            <div class="flex flex-col justify-evenly">

                <div class="">
                    <h2 class="text-2xl font-bold">{{ getAuthorName }}</h2>
                    <strong>Бизнес-коуч</strong>
                </div>
                <ul class="list">
                    <li>Учу делать РЕАЛЬНЫЕ бабки, на себя просто не хватило времени</li>
                    <li>НЕ знаю, что такое "Успешный Успех", но знаю, что нужно ТЕБЕ!</li>
                    <li>Пообещал, что побреюсь, когда кого-нибудь ОБМАНУ.</li>
                </ul>
            </div>
        </div>
        <div class=" m-16 mt-4">
            <p class="ml-2">Участников: {{users.length}}</p>
            <ul class="list ml-2 mt-4">
                <li
                    v-for="(user, index, users) in users"
                    :key="index"
                    class="mt-2"
                >
                    {{`${index + 1} ${getUserFullName(user)}` }}
                </li>
            </ul>
        </div>

    </div>
</template>


<script>
export default {
    name: 'userCard',
    data() {
        return {
            firstName: 'Ignatij',
            secondName: 'Ilarionovich',
            lastName: 'Bogatov',
            users: [
                {
                    firstName: 'Ivan',
                    secondName: 'Ivanovich',
                    lastName: 'Marterasyan 1',
                },
                {
                    firstName: 'Ivan',
                    secondName: 'Ivanovich',
                    lastName: 'Marterasyan 2',
                },
                {
                    firstName: 'Ivan',
                    secondName: 'Ivanovich',
                    lastName: 'Marterasyan 3',
                }
            ],
        }
    },
    computed: {
        getAuthorName() {
            return `${this.firstName} ${this.secondName} ${this.lastName}`.toUpperCase()
        }
    },
    methods: {
      getUserFullName(user) {
          return `${user.firstName} ${user.secondName} ${user.lastName}`
      }
    },
}
</script>

