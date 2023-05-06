
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">name</label>
            <input id="name" type="text" name="name" required autofocus autocomplete="name" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" required autocomplete="username" />
        </div>

        <!-- Type  -->
        <div>
            <label for="type">type</label>
            <select id="type" name="type" required>
                <option value="" selected disabled hidden>'Choose an option'</option>
            
                <option value="student">student</option>
                <option value="prof">prof</option>
                <option value="supervisor">supervisor</option>
            </select>
        </div>

        <!-- Password -->
        <div>
            <label for="password">Password</label>

            <input id="password"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">Confirm Password</label>

            <input id="password_confirmation"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
        </div>

        <div>
            <a href="{{ route('login') }}">
                Already registered?
            </a>

            <button>
                Register
            </button>
        </div>
    </form>

