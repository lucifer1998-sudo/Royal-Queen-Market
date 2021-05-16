<?php

namespace App\Http\Requests\Admin;

use App\Conversation;
use App\Events\Message\MessageSent;
use App\Message;
use App\User;
use Illuminate\Foundation\Http\FormRequest;

class SendMessageUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'message' => 'required|string',
            'user_id' => 'required',
        ];
    }

    public function persist() {
        $receiver = User::find($this->user_id);
        if(empty($receiver)) {
            return;
        }
        $newConversation = Conversation::findOrCreateMassMessageConversation($receiver);

        $newMessage = new Message;
        $newMessage -> setConversation($newConversation);
        $newMessage -> setReceiver($receiver);
        $newMessage -> setMassMessageContent($this -> message, $receiver);
        $newMessage -> save();

        event(new MessageSent($newMessage));
    }
}
