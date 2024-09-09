import {router} from "@inertiajs/vue3";
import {push} from "notivue";
import {toast} from "vue3-toastify";

export function useEmployeeAction() {
    const destroyEmployeeData = (id, item, route) => {
        item.clear();

        router.delete(route,{
            preserveScroll: true,
            onSuccess: () => push.success({
                message: 'Deleted Successfully',
                props: {
                    result: true
                }
            }),
            onError: () => toast.error('Something Went Wrong:(')
        })
    }

    return {
        destroyEmployeeData
    }
}
