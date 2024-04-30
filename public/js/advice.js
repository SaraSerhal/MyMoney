document.addEventListener('DOMContentLoaded', (event) => {
    const cards = document.querySelectorAll('.advice-card');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            alert('You liked this advice!');
            // Ici, vous pourriez ajouter un véritable système de like, enregistrant le choix de l'utilisateur.
        });
    });
});
