import {useRemember} from "@inertiajs/vue3";

export function useEmployeeForm(){
    const personalInformationFormData = useRemember({
        firstName: '',
        middleName: '',
        lastName: '',
        gender: '',
        dateOfBirth: '',
        email: '',
        phoneNumber: '',
        streetAddress: '',
        municipality: '',
        cityOrProvince: '',
        postalCode: '',
    }, 'PersonalInformation');

    const personalInformationErrors = useRemember({
        firstName: [],
        middleName: [],
        lastName: [],
        gender: [],
        dateOfBirth: [],
        email: [],
        phoneNumber: [],
        streetAddress: [],
        municipality: [],
        cityOrProvince: [],
        postalCode: [],
    }, 'PersonalInformationErrors')

    const professionalInformationFormData = useRemember({
        joiningDate: '',
        department: '',
        position: '',
        team: '',
        ratePerHour: '',
    }, 'ProfessionalInformation')

    const accountAccessFormData = useRemember({
        accessEmail: '',
        accessPassword: ''
    }, 'AccountAccess');

    // const updateForm = (formData, newValue) => {
    //     setFormValues(formData, newValue);
    // }
    // const setFormValues = (form, values) => {
    //     Object.keys(form.value).forEach(key => {
    //         form.value[key] = values[key];
    //     });
    // }

    return {
        personalInformationFormData,
        professionalInformationFormData,
        accountAccessFormData,
        personalInformationErrors
        // updateForm,
        // setFormValues
    }

}
