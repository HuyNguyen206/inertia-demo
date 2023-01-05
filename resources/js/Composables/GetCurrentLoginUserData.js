import User from "@/Models/User";
import {Inertia} from "@inertiajs/inertia";

export function GetCurrentLoginUserData(){

    let currentUser = new User(Inertia.page.props.auth.user)
    let permissions = Inertia.page.props.auth.permissions

    return {currentUser, permissions}
}
