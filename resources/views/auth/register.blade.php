<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <script src="https://cdn.tailwindcss.com">
  tailwind.config = {
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        orange: {"50":"#fff7ed","100":"#ffedd5","200":"#fed7aa","300":"#fdba74","400":"#fb923c","500":"#f97316","600":"#ea580c","700":"#c2410c","800":"#9a3412","900":"#7c2d12"}
      }
    },
    fontFamily: {
      'body': [
    'Inter', 
    'ui-sans-serif', 
    'system-ui', 
    '-apple-system', 
    'system-ui', 
    'Segoe UI', 
    'Roboto', 
    'Helvetica Neue', 
    'Arial', 
    'Noto Sans', 
    'sans-serif', 
    'Apple Color Emoji', 
    'Segoe UI Emoji', 
    'Segoe UI Symbol', 
    'Noto Color Emoji'
  ],
      'sans': [
    'Inter', 
    'ui-sans-serif', 
    'system-ui', 
    '-apple-system', 
    'system-ui', 
    'Segoe UI', 
    'Roboto', 
    'Helvetica Neue', 
    'Arial', 
    'Noto Sans', 
    'sans-serif', 
    'Apple Color Emoji', 
    'Segoe UI Emoji', 
    'Segoe UI Symbol', 
    'Noto Color Emoji'
  ]
    }
  }
}
  </script>
</head>
<body>


  <section class="bg-white dark:bg-gray-900">
    <div class="grid lg:h-screen lg:grid-cols-2">
        <div class="flex justify-center items-center py-6 px-4 lg:py-0 sm:px-0">


            <form class="space-y-4 max-w-md md:space-y-6 xl:max-w-xl" method="POST" action="{{ route('register') }}">
                @csrf


                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Welcome to stagelink</h2>
                

                <div class="flex items-center">
                    {{-- <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div>
                    <div class="px-5 text-center text-gray-500 dark:text-gray-400">or</div>
                    <div class="w-full h-0.5 bg-gray-200 dark:bg-gray-700"></div> --}}
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">What should we call you?</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="John Doe" required autofocus autocomplete="name">
                  </div>


                <!-- Email -->
                <div>
                  <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                  <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="example@example.com" required autofocus autocomplete="email">
                </div>


                <div class="items-center space-y-3 space-x-0 sm:flex sm:space-x-4 sm:space-y-0">
                                    <!-- Type -->
                <div>
                      
                        
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Account type</label>
                <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  <option selected disabled hidden value="">Choose an option</option>
                  <option value="student">Student</option>
                  <option value="prof">Professor</option>
                  <option value="supervisor">Supervisor</option>
                </select>
                    
                </div>
                                    <!-- Group, CV and Company based on type selection -->
                    <div id="additional-inputs-container">
                        <div class="items-center space-y-3 space-x-0 sm:flex sm:space-x-4 sm:space-y-0">
                                                   
                        <!-- Group input -->
                    <div id="group-input" style="display: none;">

                        <label for="group" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Group</label>
                       <input id="group" type="text" name="group" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />

                    </div>

                        <!-- CV input -->
                    <div id="cv-input" style="display: none;">
                        <label for="cv" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload CV</label>
                        <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" name="cv" id="cv" type="file">
                    </div>

                        </div>
                
                        <!-- Company input -->
                    <div id="company-input" style="display: none;">

                        <label for="company_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Company</label>
                        <input id="company_id" type="text" name="company_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" />

                    </div>

                    </div>
                </div>
                
                <!-- password -->
                <div>
                  <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                  <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                </div>

                <!-- Confirm password -->
                <div>
                    <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm password</label>
                    <input type="password" name="password_confirmation" id="confirm-password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                  </div>


                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                          <input id="terms" aria-describedby="terms" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-orange-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-orange-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="terms" class="font-light text-gray-500 dark:text-gray-300">By signing up, you are creating a Stagelink account, and you agree to Stagelink’s <a class="font-medium text-orange-600 dark:text-orange-500 hover:underline" href="#">Terms of Use</a> and <a class="font-medium text-orange-600 dark:text-orange-500 hover:underline" href="#">Privacy Policy</a>.</label>
                        </div>
                    </div>


                    <div class="flex items-start">
                        {{-- <div class="flex items-center h-5">
                          <input id="newsletter" aria-describedby="newsletter" type="checkbox" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-orange-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-orange-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <div class="ml-3 text-sm">
                          <label for="newsletter" class="font-light text-gray-500 dark:text-gray-300">Email me about product updates and resources.</label>
                        </div> --}}
                    </div>
                </div>


                <button type="submit" class="w-full text-white bg-orange-600 hover:bg-orange-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-700">Create an account</button>
                <p class="text-sm font-light text-gray-500 dark:text-gray-300">
                    Already have an account? <a href="{{ route('login') }}" class="font-medium text-orange-600 hover:underline dark:text-orange-500">Login here</a>
                </p>
            </form>


        </div>  
        <div class="flex justify-center items-center py-6 px-4 bg-orange-600 lg:py-0 sm:px-0">
            <div class="max-w-md xl:max-w-xl">
                <a href="#" class="flex items-center mb-4 text-2xl font-semibold text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                      </svg>
                      
                    Stagelink    
                </a>
                <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white xl:text-5xl">Welcome to StageLink: Your Path to Success!</h1>
                <p class="mb-4 font-light text-orange-200 lg:mb-8">
                    StageLink is your go-to web app to unlock a world of opportunities.
                    Sign up for StageLink today and discover the path to success!
                </p>
            </div>
        </div>              
    </div>
  </section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#type').change(function () {
            var selectedType = $(this).val();

            // Hide all additional inputs
            $('#group-input').hide();
            $('#cv-input').hide();
            $('#company-input').hide();

            // Show relevant additional inputs based on the selected type
            if (selectedType === 'student' ) {
                $('#group-input').show();
                $('#cv-input').show();
            } else if (selectedType === 'prof') {
                $('#group-input').show();
            } else if (selectedType === 'supervisor') {
                $('#company-input').show();
            }
        });
    });
</script>



</body>
</html>


