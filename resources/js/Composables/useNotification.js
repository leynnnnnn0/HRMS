import {push} from "notivue";

export function useNotification(){
    const pushConfirmation = (id) => {
        push.info({
            message: "Are you sure you want to delete this employee?",
            props: {
                delete: true,
                id: id,
            }
        })
    }

    return {
        pushConfirmation,
    };

}
