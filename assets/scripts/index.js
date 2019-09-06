import mentores from "./objects.js";
$(() => {
    $('#first_section').html(
        mentores.map(m => m.nome)
    )
    console.log(mentores.filter(m => m.nome === 'Lucas Medeiros'))
})
