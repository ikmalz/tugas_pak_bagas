<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>index</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        section {
            display: none;
        }

        section.active {
            display: block;
        }
    </style>
</head>

<body>
    <header class="bg-transparent p-4 border-b">
        <nav class="flex justify-center items-center">
            <div class="cursor-pointer text-center font-medium">
                <a href="#" class="text-black hover:bg-gray-100 rounded-lg p-2" onclick="showSection('home')">Home</a>
                <a href="#" class="text-black ml-4 hover:bg-gray-100 rounded-lg p-2" onclick="showSection('about')">About</a>
                <a href="#" class="text-black ml-4 hover:bg-gray-100 rounded-lg p-2" onclick="showSection('contact')">Contact</a>
            </div>
        </nav>
    </header>


    <div class="container mx-auto p-4">
        <section id="home" class="active">
            <h1>Home</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quod.</p>
        </section>
        <section id="about" class="bg-gray-100 p-6 rounded-lg shadow-lg">
            <div class="text-center">
                <h1 class="text-2xl font-bold text-gray-800 mb-4">About</h1>
                <img src="WhatsApp Image 2025-02-17 at 13.12.47_5622caff.jpg" alt="Foto Ikmal" class="w-40 h-40 rounded-full mx-auto shadow-md object-cover">
            </div>
            <div class="mt-6">
                <p class="text-gray-700"><span class="font-semibold">Name:</span> Ikmal Fairuz Arabi</p>
                <p class="text-gray-700"><span class="font-semibold">class:</span> XI RPL 2</p>
                <p class="text-gray-700"><span class="font-semibold">Addres:</span> Jl. Bhakti Abri - Kel Sukamaju Baru, Kec Tapos, Bekasi</p>
                <p class="text-gray-700"><span class="font-semibold">place and date of birth:</span> depok, 04 Juni 2008</p>
                <p class="text-gray-700"><span class="font-semibold">religion:</span> Islam</p>
                <p class="text-gray-700"><span class="font-semibold">gender:</span> Man</p>
                <p class="text-gray-700"><span class="font-semibold">Origin of school:</span> SMK Taruna Bhakti</p>
            </div>
        </section>


        <section id="contact">
            <h1 class="text-2xl font-bold mb-4">Contact</h1>
            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6 max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
                @csrf
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Your Email</label>
                    <input type="email" name="email" id="email" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="name@domain.com" required>
                </div>
                <div>
                    <label for="subject" class="block mb-2 text-sm font-medium text-gray-700">phone number</label>
                    <input type="text" name="subject" id="subject" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-3" placeholder="" required>
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-700">Your Message</label>
                    <textarea name="message" id="message" rows="4" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" placeholder="Leave your message here..." required></textarea>
                </div>
                <button type="submit" class="w-full bg-gray-600 text-white py-3 rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 focus:outline-none">Send Message</button>
            </form>

        </section>
    </div>
    @if(session('success'))
    <div class="bg-blue-500 text-white p-4 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

</body>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('section').forEach(section => {
            section.classList.remove('active');
        });

        document.getElementById(sectionId).classList.add('active');
    }
</script>

</html>