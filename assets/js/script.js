// document.querySelectorAll('.faq-question').forEach(button => {
//     button.addEventListener('click', () => {
//         const faqItem = button.parentElement;
        
//         // Agar pehle se active hai toh close kar do, varna open
//         if (faqItem.classList.contains('active-faq')) {
//             faqItem.classList.remove('active-faq');
//         } else {
//             // Baqi sab items se active class hata do (taake sirf ek khula rahe)
//             document.querySelectorAll('.faq-item').forEach(item => item.classList.remove('active-faq'));
//             faqItem.classList.add('active-faq');
//         }
//     });
// });