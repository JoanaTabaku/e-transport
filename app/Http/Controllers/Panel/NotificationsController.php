<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;


// schema:
// */
// public function up(): void
// {
//     Schema::create('notifications', function (Blueprint $table) {
//         $table->id();
//         $table->foreignId('from_user_id')->constrained('users');
//         $table->foreignId('to_user_id')->constrained('users');
//         $table->dateTime('sent_date');
//         $table->boolean('is_read')->default(false);
//         $table->text('message')->after('is_read');
//         $table->timestamps();
//     });
// }

// model:
// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Notification extends Model
// {
//     use HasFactory;

//     public function sender()
//     {
//         return $this->belongsTo(User::class, 'from_user_id');
//     }

//     public function receiver()
//     {
//         return $this->belongsTo(User::class, 'to_user_id');
//     }
// }


// form:

//     <label for="to_user_id">Send to</label>
//     <select class="form-control @error('to_user_id') is-invalid @enderror" name="to_user_id" id="to_user_id">
//         <option value="">Select a user</option>
//         @foreach($users as $user)
//             <option value="{{ $user->id }}" {{ old('to_user_id', '') == $user->id ? 'selected' : '' }}>{{ $user->firstname }} {{ $user->lastname }}</option>
//         @endforeach
//     </select>
//     @error('to_user_id')
//         <div class="invalid-feedback">{{ $message }}</div>
//     @enderror
// </div>
// <div class="form-group">
//     <label for="message">Message</label>
//     <input type="text" class="form-control @error('message') is-invalid @enderror" name="message" id="message" value="{{ old('message', '') }}" aria-describedby="message">
//     @error('message')
//         <div class="invalid-feedback">{{ $message }}</div>
//     @enderror
// </div>

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Notification::all();
        return view('pages.admin.notifications.notifications', compact('notifications'));
    }

    public function show($id)
    {
        $notification = Notification::find($id);
        return view('pages.admin.notifications.single', compact('notification'));
    }

    public function new()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('pages.admin.notifications.new', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'message' => 'required'
        ]);

        $data = $request->except('_token');
        $data['from_user_id'] = auth()->user()->id;
        $data['sent_date'] = now();
        Notification::create($data);

        return redirect()->route('admin.notifications')->with('success', 'Notification sent successfully.');
    }

    public function edit($id)
    {
        $notification = Notification::find($id);
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('pages.admin.notifications.edit', compact('notification', 'users'));
    }

    public function update(Request $request, $id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return redirect()->route('admin.notifications')->with('error', 'Notification not found.');
        }

        $request->validate([
            'to_user_id' => 'required|exists:users,id',
            'message' => 'required'
        ]);

        $data = $request->except('_token');
        $notification->update($data);

        return redirect()->route('admin.notifications')->with('success', 'Notification updated successfully.');
    }

    public function delete($id)
    {
        $notification = Notification::find($id);
        $notification->delete();

        return redirect()->route('admin.notifications')->with('success', 'Notification deleted successfully.');
    }
    

    // User Methods
    public function userNotifications()
    {
        $notifications = Notification::where('to_user_id', auth()->user()->id)->get();
        return view('pages.user.notifications.notifications', compact('notifications'));
    }

    public function userShow($id)
    {
        $notification = Notification::find($id);
        return view('pages.user.notifications.single', compact('notification'));
    }

    public function markAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->is_read = true;
        $notification->save();

        return redirect()->route('user.notifications')->with('success', 'Notification marked as read.');
    }
}
