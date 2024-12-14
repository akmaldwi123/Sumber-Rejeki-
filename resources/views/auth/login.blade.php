<!DOCTYPE html>
<html lang="en">

<head>
                </div>
                @if (session('status'))
                    <p class="alert alert-success">{{ session('status') }}</p>
                @endif
                @if ($errors->any())
                    <p class="alert alert-danger">{{ $errors->first() }}</p>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-container">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn-submit">Login</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>

</html>
