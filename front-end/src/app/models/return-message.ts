export interface ReturnMessage<ObjectType = any> {
    ok: boolean;
    msg?: string;
    msgs?: string[];
    errors?: string[];
    data?: ObjectType;
}
